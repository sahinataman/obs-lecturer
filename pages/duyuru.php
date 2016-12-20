<?php
//include('includes/httpful.phar');

$user_name=$_SESSION["userName"];
$user_token=$_SESSION["key"];
$id=$_GET["id"];

$announcements_json=getApi($user_token,"http://127.0.0.1:8000/announcements/$id/?format=json");
?>
<head>
<style>


div.desc {
    padding: 20px 70px 75px 100px;
}

</style>
</head>
 
 
    <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
		  
              <!-- page start-->

              <div class="row">
                  
                      <section class="panel">
                          <header class="panel-heading">
                                <div ><center><h3 class="page-header"><?php echo $announcements_json["title"]; ?></h3></ center></div>
                                <div ><h3 ><center><?php echo $announcements_json["created_date"]; ?></center></h3></div>        
                          </header>
                            <div class="desc"><h3 ><center><?php echo $announcements_json["description"]; ?></center></h3></div>
                            
                              </tbody>
                          </table>
                      </section>
                  
              </div>
              
              <!-- page end-->
          </section>
      </section>