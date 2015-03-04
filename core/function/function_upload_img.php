<?php
		      //$_file name, session name after upload (array name), 2nd lvl of session name (array key name), 
function upload($fichiers, $infosession, $infosession2, $infosession3 = null)
{
			//********************************
			//Gestion de la taille des fichier
			//********************************
			ini_set("memory_limite","-1");
			ini_set("post_max_size","5M");
			
			//**************************
			//Gérer extension du fichier
			//**************************
			$ext = array('jpg' , 'jpeg' , 'gif' , 'png');
			$ext_upload = strtolower( substr( strrchr($_FILES[$fichiers]['name'], '.'), 1) );
			if (in_array($ext_upload, $ext))
			{
				//echo "Cette extension est autorisée ! <br />";
			}
			else
			{
				//echo "Cette extension n'est pas autorisée ! <br />";
			}
			
			//***********************************
			//les dimension d'une image
			//***********************************
			$sizes = getimagesize($_FILES[$fichiers]['tmp_name']);
			//echo "Largeur : {$sizes[0]} pixels<br />";
			//echo "Hauteur : {$sizes[1]} pixels<br />";
			
			//****************************************************
			//Déplacement du fichier recu avec remplacement de nom
			//****************************************************
			
			$url = md5(uniqid(rand(),true));
			$exp = explode(".",$_FILES[$fichiers]['name']);
			//echo "Nouveau nom : {$url}<br />";
			if (move_uploaded_file($_FILES[$fichiers]['tmp_name'],"public/images/".$url.".".$ext_upload))
			{
				//echo "Le fichier est bien enregistré !";
			}
				
			//***********************************
			//Redimention d'une image
			//***********************************
			$image = ImageCreateFromJPEG("public/images/".$url.".".$ext_upload);
			$width = imagesx($image);
			$height = imagesy($image);
			
			if ($width>$height)
			{
				// Format horizontale
				$new_width = 1080;
				$new_height = ($new_width * $height) / $width ;
			}
			else
			{
				// Format vertical
				$new_height = 720;
				$new_width = ($new_height * $width) / $height ;
			}
			$thumb = imagecreatetruecolor($new_width, $new_height);
			imagecopyresampled($thumb, $image, 0,0,0,0,$new_width, $new_height, $width, $height);
			ImageJPEG($thumb, "public/images/".$url.".".$ext_upload);
			//chmod ("fichiers/".$url.".jpg", 0644);
			imagedestroy($image);
			$upload = "public/images/".$url.".".$ext_upload;
			if($infosession3 != null)
			{
				$_SESSION[$infosession][$infosession2][$infosession3] = $upload;
			}
			else
			{
				$_SESSION[$infosession][$infosession2] = $upload;
			}
			
			//echo $avatar_files;
			//$user_name = $_SESSION["User"]->USE_USERNAME;
			//$user_id = $_SESSION["User"]->USE_ID;
			//echo $user_name;
			//echo $user_id;
			//$query="UPDATE insta_users
						//SET USE_AVATAR='$avatar_files' WHERE USE_ID=$user_id";
			
			//echo $query;
			/*			
			$q = mysql_query($query);
				
			if ($q)
			{
				$_SESSION["User"]["USE_AVATAR"] = $avatar_files;
				header("location:../".PREFIX_PAGE."profil_avatar.php");
				exit;
			}
			else
			{
				header("location:../".PREFIX_PAGE."profil_avatar.php?message=ERREUR");
				exit;
			}*/
			}
			?>