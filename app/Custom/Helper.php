<?php  

namespace App\Custom;
class Helper {

	public static function imageUploadRaw($insertId = null, $imageData = null, $folderPath = null, $height = null, $width = null)
    {
        $image = isset($imageData) ? $imageData : null;
        if (empty($image)) {
            $fileName = NULL;
        } else {
            if ($image->isValid()) {
                $destinationPath = public_path() .'/'. $folderPath;
                $extension = $image->getClientOriginalExtension();
                $uniqPath = substr($imageData->getPathName(),16,4);
                $fileName = $insertId . '-' . date("Ymdhis") . $uniqPath . '.' . $extension; // renameing image
                $image->move($destinationPath,$fileName);
            }
        }
        if (file_exists($destinationPath.$fileName) && ($height != null || $width != null)) {
            self::imageResize($destinationPath.$fileName,$height,$width);
        }
        return $fileName;
    }

    public static function imageResize($imageData = null, $newHeight = null, $newWidth = null)
    {
        header('Content-Type: image/jpeg');
        // Get new sizes
        list($width, $height) = getimagesize($imageData);
        $newImage = imagecreatetruecolor($newWidth, $newHeight);
        $source = imagecreatefromjpeg($imageData);
        imagecopyresized($newImage, $source, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
        imagejpeg($newImage,$imageData);
        imagedestroy($newImage);
        return;
    }
    public static function isSelected($type)
    {
        return str_replace([1, 0], ['Selected','Not Selected'], $type);
    }
    public static function getStatus($action=null)
    {
        $search = ['inactive','active','delete'];
        $replace = [0, 1, 2];
        return str_replace($search, $replace, $action);
    }

    public static function menuType($type)
    {
        $search = [0,1,2];
        $replace = ['None','Front','Top'];
        return str_replace($search, $replace, $type);
    }

     //Convert Bangla Date Time
    public static function bnNum($num)
    {
        $search_array = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0", ",");
        $replace_array = array("১", "২", "৩", "৪", "৫", "৬", "৭", "৮", "৯", "০", ",");
        // convert all en char to bn char
        return str_replace($search_array, $replace_array, $num);
    }
}


  