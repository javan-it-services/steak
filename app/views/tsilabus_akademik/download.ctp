<?php
	
	 header('Content-type: ' . $file['Tfile']['type']);
    header('Content-length: ' . $file['Tfile']['size']); // some people reported problems with this line (see the comments), commenting out this line helped in those cases
    header('Content-Disposition: attachment; filename="'.$file['Tfile']['name'].'"');
   
 ?>
