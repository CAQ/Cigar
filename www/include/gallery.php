<link href="assets/css/gallery.css" rel="stylesheet">
<div class="row center">
    <ul>
        <?php
            $dirname = "../skins/";
            $images = scandir($dirname);
            $ignore = array(".", "..");
            foreach($images as $curimg) {
                if (!in_array($curimg, $ignore) && strtolower(pathinfo($curimg, PATHINFO_EXTENSION)) == "png") {
        ?>
        <li class="skin" onclick="$('#nick').val($(this).find('.title').text());" data-dismiss="modal">
            <div class="circular" style='background-image: url("./<?php echo $dirname.$curimg ?>")'></div>
            <h4 class="title"><?php echo mb_pathinfo($curimg, PATHINFO_FILENAME); ?></h4>
        </li>
        <?php
                }
            }                 
        ?>
    </ul>
</div><?php
// Modified from http://php.net/manual/en/function.pathinfo.php
function mb_pathinfo($filepath, $options) {
    preg_match('%^(.*?)[\\\\/]*(([^/\\\\]*?)(\.([^\.\\\\/]+?)|))[\\\\/\.]*$%im', $filepath, $m);
    $ret = array('dirname'=>null, 'basename'=>null, 'extension'=>null, 'filename'=>null);
    if ($m[1]) $ret['dirname'] = $m[1];
    if ($m[2]) $ret['basename'] = $m[2];
    if ($m[5]) $ret['extension'] = $m[5];
    if ($m[3]) $ret['filename'] = $m[3];
    if (is_null($options)) {
        return $ret;
    } elseif ($options == PATHINFO_DIRNAME) {
        return $ret['dirname'];
    } elseif ($options == PATHINFO_BASENAME) {
        return $ret['basename'];
    } elseif ($options == PATHINFO_EXTENSION) {
        return $ret['extension'];
    } elseif ($options == PATHINFO_FILENAME) {
        return $ret['filename'];
    } else {
        return $ret;
    }
}?>
