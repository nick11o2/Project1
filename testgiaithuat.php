<?php
$ma_sp_lay_tu_db = "CD-026";
$ma_sp_prefix = substr($ma_sp_lay_tu_db,0,2);
$ma_sp_id     = substr($ma_sp_lay_tu_db,-3);
$ma_sp_id     = (int)$ma_sp_id +1;
$ma_sp_id     = str_pad($ma_sp_id,3,"0",STR_PAD_LEFT);
echo($ma_sp_id);
$ma_sp = "{$ma_sp_prefix}-{$ma_sp_id}";

echo "Mã cũ: {$ma_sp_lay_tu_db} =====> Mã mới: {$ma_sp}";
?>