<?php

if($_POST["search"] == "")
  {
    $_POST["search"] = '*';

  }
  // Search By Name or Email
  $strSQL = "SELECT subject_id,subject_name,credit 
  FROM subject 
  WHERE (subject_id LIKE '%".$_POST["search"]."%' 
  or credit LIKE '%".$_POST["cdsrch"]."%' 
  or ctgy LIKE '%".$_POST["gsrch"]."%' )";

  $objQuery = mysqli_query($objCon,$strSQL) or die ("Error Query [".$strSQL."]");
  
  
  
  while($objResult = mysqli_fetch_array($objQuery))
  {
  }
  mysql_close($objConnect);

?>