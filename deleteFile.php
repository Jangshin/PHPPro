<?php
function delFile($dirName,$delSelf=false){
    if(file_exists($dirName) && $handle = opendir($dirName)){
        while(false !==($item = readdir( $handle))){
            if($item != '.' && $item != '..'){
                if(file_exists($dirName.'/'.$item) && is_dir($dirName.'/'.$item)){
                    delFile($dirName.'/'.$item);
                }else{
                    if(!unlink($dirName.'/'.$item)){
                        return false;
                    }
                }
            }
        }
        closedir($handle);
        if($delSelf){
            if(!rmdir($dirName)){
                return false;
            }
        }
    }else{
        return false;
    }
    return true;
}
?>
