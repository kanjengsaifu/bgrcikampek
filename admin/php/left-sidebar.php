<?php
  if($type=="Admin"){

require "m_admin.php";

  }
  if($type=="Editor"){

require "m_editor.php";

  }
  if($type!=="Editor" && $type!=="Admin"){

require "m_user.php";

  }
?>
