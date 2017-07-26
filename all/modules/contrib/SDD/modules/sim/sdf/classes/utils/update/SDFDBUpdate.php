<?php

namespace sdf\utils\update;

use sdf\exceptions\SDFUpdateException;
use sdf\utils\SDFPath;
use sdf\utils\SDFStr;

class SDFDBUpdate extends SDFBaseUpdate {

    private $extensions = array(
        'sql',
        //'gz',
        //'zip'
    );

    public function validate() {
        if (!$this->requireModule('backup_migrate')) {
            $e = 'DB update: the required module "backup_migrate" is not found.';
            throw new SDFUpdateException($e);
        }

        if (!$this->requireFolder('db')) {
            $e = 'DB update: the required folder "db" is not found.';
            throw new SDFUpdateException($e);
        }

        return TRUE;
    }

    public function update() {
        $dir = $this->scanDir('db');
        if (empty($dir)) {
            return;
        }
        $path = $this->getUpdatePath('db');

        foreach ($dir as $file) {
            $source = $path . $file;
            if (!$this->validExtension($source, $this->extensions)) {
                $ext = pathinfo($source, PATHINFO_EXTENSION);
                $e = 'DB update: unsupported file extension ' . $ext . '. ';
                $e .= 'Allowed: ' . implode(',', $this->extensions);
                throw new SDFUpdateException($e);
            }
            if (!$this->validContent($source)) {
                continue;
            }
            $location = $this->getBackupLocation();
            $dest = SDFPath::getFileSystemPath($location) . '/' . $file;
            backup_migrate_include('crud');
            copy($source, $dest);
            backup_migrate_perform_restore('manual', $file);
            unlink($dest);
        }
    }

    /**
     * Get the backup location from backup_migrate.
     *
     * @return string
     */
    private function getBackupLocation() {
        $q = db_select('backup_migrate_destinations');
        $fields = array(
            'location'
        );
        $q->fields('backup_migrate_destinations', $fields)->condition('destination_id', 'manual');
        $r = $q->execute();
        $row = $r->fetchAll();
        if (empty($row)) {
            // Default backup location for manual.
            $location = 'private://backup_migrate/manual';
        } else {
            // Custom backup location for manual.
            $location = $row[0]->location;
        }
        return $location; //SDFPath::getFileSystemPath($location);
    }

    private function gzDecode($source) {
        if (function_exists("gzopen")) {
            $dest = uniqid($source) . '.sql';
            if (($out = fopen($dest, 'wb')) && ($in = gzopen($source, 'rb'))) {
                while (!feof($in)) {
                    fwrite($out, gzread($in, 1024 * 512));
                }
            }
            gzclose($in);
            fclose($out);
            return $dest;
        } else {
            $e = SDFStr::get('EXCEPTION_UPDATE_COMPRESSION_NOT_SUPPORT', array(
                '!name' => 'DB', '!file' => $source
            ));
            throw new SDFUpdateException($e);
        }
    }

    private function zipDecode($source) {
        if (class_exists('ZipArchive')) {
            $zip = new ZipArchive();
            $dest = uniqid($source) . '.sql';
            $res = $zip->open($dest, constant("ZipArchive::CREATE"));
            if ($res === TRUE) {
                $zip->addFile($source, $filename);
                $success = $zip->close();
            }
        } else {
            $e = SDFStr::get('EXCEPTION_UPDATE_COMPRESSION_NOT_SUPPORT', array(
                    '!name' => 'DB', '!file' => $source
            ));
            throw new SDFUpdateException($e);
        }
        return $success;
    }

}
