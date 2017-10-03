<?php
 session_start();
 include('settings.inc');
 include('header.php');
 $user=$_SESSION['username'];
 $pwd=$_SESSION['pwd']; $enrolled_id=$_SESSION['enrolled_id'];
 $sql="select * from members where username='".$username."' and pwd='".$pwd."'";
 $query=mysqli_query($conn,$sql);
 $result=mysqli_fetch_array($query);
 $enroller_id=$result['enroller_id'];
 $enrolled_id=$result['enrolled_id'];
 //$d_left="left_mem";
 //$d_right="right_mem";
 
 /*if($_GET['mode']=="view")
{
	$enrolled_id=$_GET['enrolled_id'];
	//$compname = ereg_replace("[ \t\n\r]+", "_", $compname);
	$sql="slect * FROM geneology WHERE companyname = '".$companyname."'";
	$update_sql=mysqli_query($conn,$sql);
	$message="Data Deleted Successfully";
	$sql1="drop table ".$companyname."";
	$query1=mysqli_query($conn,$sql1);
	$spg = "_spg";
	$table = $companyname.$spg; 
	$sql12="drop table ".$table."";
	$query12=mysqli_query($conn,$sql12);
	
}
if($_GET['mode']=="edit")
{
$message="Company Profile Updated Successfully";
}
 
 */
		//}

?>
<head>       
<link href="style2.css" rel="stylesheet" type="text/css">

<style type="text/css">
<!--
.style1 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	color: #A41415;
}
-->
</style></head>
<body bgcolor="#666666" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table width="990" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr> 
    <td width="200" valign="top" bgcolor="#FFFFFF"> 
            
      <div align="center">
        <?php include('categoryside.php'); ?>             
        </div></td>
    <td width="785" valign="top" bgcolor="#FFFFFF"> 
			<br>
<br>
<br>


	  <div align="center">
	    <!-- -------------------------------------------   -->
			    
	    <table id="Table_01" width="646" height="415" border="0" cellpadding="0" cellspacing="0">
	      <tr>
	        <td colspan="5">&nbsp;</td>
		    <td width="123" height="84" colspan="3" align="center" valign="middle" background="images/tree_09.gif">	
		      
		      <div align="center" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-weight:bold; font-size:11px;margin:10px 10px 10px 10px;"><a href=# color=white>
		        
		        <?php  
		 
				$query  = "SELECT * from members where enrolled_id='".$enrolled_id."'";
					$querys=mysqli_query($conn,$sql)or die(mysql_error());
 					$results=mysqli_fetch_array($querys);
					$enrolled_id1=$results['enrolled_id'];
					//$enroller_id1=$results['enroller_id'];
					$mem_name=$results['mem_name'];
					//$mem_name = ereg_replace("[ \t\n\r]+", "_", $mem_name);
					$mem_name1=str_replace("_"," ",$mem_name);
					$statuse=$results['statuse'];
					$direction=$results['direction'];
				
								
				  ?>
		        
		        
		        
		        <font color=white><?php echo $mem_name1?></font></a> <BR>
		        ID: <?php echo $enrolled_id1?><br>
		        <strong><font color=lightgreen>Status:<?php echo $statuse?></font></strong> <br>
            <a href=""><font color=white>View Details</font></a> </div>		  </td>
		    <td colspan="5">&nbsp;</td>
	    </tr>
	      <tr>
	        <td rowspan="2">&nbsp;</td>
		    <td height="78" colspan="11"align="center" valign="bottom" background="images/tree_05.gif">&nbsp;</td>
		    <td rowspan="2">&nbsp;</td>
	    </tr>
	      <tr>
	        <td width="123" height="84" colspan="3" align="center" valign="middle" background="images/tree_09.gif"><div align="center" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-weight:bold; font-size:11px;margin:10px 10px 10px 10px;"> <a href=# color=white><font color=white>
<?php
 					$sql1="select * from personally_enrolled where enroller_id='".$enrolled_id1."'";
 					$query1=mysqli_query($conn,$sql1)or die(mysql_error());
 					$result1=mysqli_fetch_array($query1);
					$left_mem=$result1['left_mem'];
					$test="left_mem";
					
					if($left_mem==$test)
					{
					$querye  = "SELECT * from members where enroller_id='".$enrolled_id1."' and direction='".$left_mem."'";
					
					$querys=mysqli_query($conn,$querye);
 					$resulta=mysqli_fetch_array($querys);
					//print_r($resulta);
					$enr=$resulta['enrolled_id'];
					//$enroller_id2=$results['enroller_id'];
					$mem=$resulta['mem_name'];
					//$mem_name = ereg_replace("[ \t\n\r]+", "_", $mem_name);
					$mem_n=str_replace("_"," ",$mem);
					$statusa=$resulta['statuse'];
					//$directiona=$resulta['direction'];
				
				 
		  
		  }
				else
				{
					if($left_mem==NULL)
				{
					$message2="Not Available";
				}
				//$message2="Available";
				}
				  ?>
		          <?php //=$message2?>
		          <?php echo $mem_n?>
	            </a></font> <BR>
	            <?php echo $enr?>
	            <br>
	            <strong><font color=lightgreen>
	            <?php echo $statusa?>
	            </font></strong> <br>
            <a href=""><font color=white>View Details</font></a> </div></td>
		    <td colspan="5">&nbsp;</td>
		    <td width="123" height="84" colspan="3" align="center" valign="middle" background="images/tree_09.gif">
			<div align="center" style="font-family:Verdana, Arial, Helvetica, sans-serif;
			font-weight:bold; font-size:11px;margin:10px 10px 10px 10px;"> <font color=white><a href=# color=white>
		      <?php
 					$sqlq="select * from personally_enrolled where enroller_id='".$enrolled_id1."'";
 					$queryq=mysqli_query($conn,$sqlq)or die(mysql_error());
 					$resultq=mysqli_fetch_array($queryq);
					$right_mem=$resultq['right_mem'];
					$test="right_mem";
					
					if($right_mem==$test)
					{
					$queryn  = "SELECT * from members where enroller_id='".$enrolled_id1."' and direction='".$right_mem."'";
					
					$querysn=mysqli_query($conn,$queryn);
 					$resultn=mysqli_fetch_array($querysn);
					//print_r($resultn);
					$enrn=$resultn['enrolled_id'];
					//$enroller_id2=$results['enroller_id'];
					$memn=$resultn['mem_name'];
					//$mem_name = ereg_replace("[ \t\n\r]+", "_", $mem_name);
					$mem_nn=str_replace("_"," ",$memn);
					$statusn=$resultn['statuse'];
					//$directiona=$resultae['direction'];
				
				 
		  
		  }
				else
				{
					if($left_mem==NULL)
				{
					$message2="Not Available";
				}
				//$message2="Available";
				}
				  ?>
				  
				  
				  
		      <?php echo $message1?>
		      <?php echo $mem_nn?>
		      </a></font> <BR>
		      <?php echo $enrn?>
			  
			  
		      <br>
		      <strong><font color=lightgreen>
		        <?php echo $statusn?>
		        </font></strong> <br>
	        <a href=""><font color=white>View Details</font></a> </div></td>
	    </tr>
	      <tr>
	        <td height="84" colspan="6" align="center" valign="bottom" background="images/tree_10.gif">&nbsp;</td>
		    <td rowspan="2">&nbsp;</td>
		    <td colspan="6" align="center" valign="bottom" background="images/tree_12.gif">&nbsp;</td>
	    </tr>
	      <tr>
	        <td colspan="2" align="center" valign="middle" background="images/tree_09.gif"><div align="center" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-weight:bold; font-size:11px;margin:10px 10px 10px 10px;"> <a href=# color=white><font color=white>
<?php
 					$sqlde="select * from personally_enrolled where enroller_id='".$enr."'";
 					$queryde=mysqli_query($conn,$sqlde)or die(mysql_error());
 					$resultde=mysqli_fetch_array($queryde);
					$left_mem=$resultde['left_mem'];
					$test="left_mem";
					
					if($left_mem==$test)
					{
					$queryf  = "SELECT * from members where enroller_id='".$enr."' and direction='".$left_mem."'";
					
					$queryf=mysqli_query($conn,$queryf);
 					$resultf=mysqli_fetch_array($queryf);
					//print_r($resulta);
					$enf=$resultf['enrolled_id'];
					//$enroller_id2=$results['enroller_id'];
					$memss=$resultf['mem_name'];
					//$mem_name = ereg_replace("[ \t\n\r]+", "_", $mem_name);
					$mem_nf=str_replace("_"," ",$memss);
					$statusaf=$resultf['statuse'];
					//$directiona=$resulta['direction'];
				
				 
		  
		  }
				else
				{
					if($left_mem==NULL)
				{
					$message2="Not Available";
				}
				//$message2="Available";
				}
				  ?>
		          <?php //=$message2?>
		          <?php echo $mem_nf?>
	            </a></font> <BR>
	            <?php echo $enf?>
	            <br>
	            <strong><font color=lightgreen>
	            <?php echo $statusaf?>
	            </font></strong> <br>
            <a href=""><font color=white>View Details</font></a> </div></td>
		    <td>&nbsp;</td>
		    <td colspan="3" align="center" valign="middle" background="images/tree_09.gif"><div align="center" style="font-family:Verdana, Arial, Helvetica, sans-serif;
			font-weight:bold; font-size:11px;margin:10px 10px 10px 10px;"> <font color=white><a href=# color=white>
		      <?php
 					$sqlr="select * from personally_enrolled where enroller_id='".$enr."'";
 					$queryr=mysqli_query($conn,$sqlr)or die(mysql_error());
 					$resultr=mysqli_fetch_array($queryr);
					$right_mem=$resultr['right_mem'];
					$test="right_mem";
					
					if($right_mem==$test)
					{
					$queryns  = "SELECT * from members where enroller_id='".$enr."' and direction='".$right_mem."'";
					
					$querysns=mysqli_query($conn,$queryns);
 					$resultns=mysqli_fetch_array($querysns);
					//print_r($resultn);
					$enrns=$resultns['enrolled_id'];
					//$enroller_id2=$results['enroller_id'];
					$memns=$resultns['mem_name'];
					//$mem_name = ereg_replace("[ \t\n\r]+", "_", $mem_name);
					$mem_ns=str_replace("_"," ",$memns);
					$statusns=$resultns['statuse'];
					//$directiona=$resultae['direction'];
				
				 
		  
		  }
				else
				{
					if($left_mem==NULL)
				{
					$message2="Not Available";
				}
				//$message2="Available";
				}
				  ?>
				  
				  
				  
		      <?php echo $message1?>
		      <?php echo $mem_ns?>
		      </a></font> <BR>
		      <?php echo $enrns?>
			  
			  
		      <br>
		      <strong><font color=lightgreen>
		        <?php echo $statusns?>
		        </font></strong> <br>
	        <a href=""><font color=white>View Details</font></a> </div></td>
		    <td colspan="3" align="center" valign="middle" background="images/tree_09.gif"><div align="center" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-weight:bold; font-size:11px;margin:10px 10px 10px 10px;"> <a href=# color=white><font color=white>
<?php
 					$sqld="select * from personally_enrolled where enroller_id='".$enr."'";
 					$queryd=mysqli_query($conn,$sqld)or die(mysql_error());
 					$resultd=mysqli_fetch_array($queryd);
					$left_mem=$resultd['left_mem'];
					$test="left_mem";
					
					if($left_mem==$test)
					{
					$queryfa  = "SELECT * from members where enroller_id='".$enr."' and direction='".$left_mem."'";
					
					$queryfa=mysqli_query($conn,$queryfa);
 					$resultfa=mysqli_fetch_array($queryfa);
					//print_r($resulta);
					$enf=$resultf['enrolled_id'];
					//$enroller_id2=$results['enroller_id'];
					$memssa=$resultfa['mem_name'];
					//$mem_name = ereg_replace("[ \t\n\r]+", "_", $mem_name);
					$mem_nfa=str_replace("_"," ",$memssa);
					$statusafa=$resultf['statuse'];
					//$directiona=$resulta['direction'];
				
				 
		  
		  }
				else
				{
					if($left_mem==NULL)
				{
					$message2="Not Available";
				}
				//$message2="Available";
				}
				  ?>
		          <?php //=$message2?>
		          <?php echo $mem_nfa?>
	            </a></font> <BR>
	            <?php echo $enfa?>
	            <br>
	            <strong><font color=lightgreen>
	            <?php echo $statusafa?>
	            </font></strong> <br>
            <a href=""><font color=white>View Details</font></a> </div></td>
		    <td>&nbsp;</td>
		    <td colspan="2" align="center" valign="middle" background="images/tree_09.gif"><div align="center" style="font-family:Verdana, Arial, Helvetica, sans-serif;
			font-weight:bold; font-size:11px;margin:10px 10px 10px 10px;"> <font color=white><a href=# color=white>
		      <?php
 					$sqlqat="select * from personally_enrolled where enroller_id='".$enrn."'";
 					$queryqat=mysqli_query($conn,$sqlqat)or die(mysql_error());
 					$resultqat=mysqli_fetch_array($queryqat);
					$right_mem=$resultqat['right_mem'];
					$test="right_mem";
					
					if($right_mem==$test)
					{
					$querynai  = "SELECT * from members where enroller_id='".$enrn."' and direction='".$right_mem."'";
					
					$querysnai=mysqli_query($conn,$querynai);
 					$resultnai=mysqli_fetch_array($querysnai);
					//print_r($resultn);
					$enrnai=$resultnai['enrolled_id'];
					//$enroller_id2=$results['enroller_id'];
					$memna=$resultnai['mem_name'];
					//$mem_name = ereg_replace("[ \t\n\r]+", "_", $mem_name);
					$mem_nnai=str_replace("_"," ",$memna);
					$statusnai=$resultn['statuse'];
					//$directiona=$resultae['direction'];
				
				 
		  
		  }
				else
				{
					if($left_mem==NULL)
				{
					$message2="Not Available";
				}
				//$message2="Available";
				}
				  ?>
				  
				  
				  
		      <?php echo $message1?>
		      <?php echo $mem_nnai?>
		      </a></font> <BR>
		      <?php echo $enrna?>
			  
			  
		      <br>
		      <strong><font color=lightgreen>
		        <?php echo $statusni?>
		        </font></strong> <br>
	        <a href=""><font color=white>View Details</font></a> </div></td>
	    </tr>
	      <tr>
	        <td>
	          <img src="images/spacer.gif" width="105" height="1" alt=""></td>
		    <td>
	        <img src="images/spacer.gif" width="18" height="1" alt=""></td>
		    <td>
	        <img src="images/spacer.gif" width="70" height="1" alt=""></td>
		    <td>
	        <img src="images/spacer.gif" width="35" height="1" alt=""></td>
		    <td>
	        <img src="images/spacer.gif" width="33" height="1" alt=""></td>
		    <td>
	        <img src="images/spacer.gif" width="55" height="1" alt=""></td>
		    <td>
	        <img src="images/spacer.gif" width="28" height="1" alt=""></td>
		    <td>
	        <img src="images/spacer.gif" width="40" height="1" alt=""></td>
		    <td>
	        <img src="images/spacer.gif" width="34" height="1" alt=""></td>
		    <td>
	        <img src="images/spacer.gif" width="49" height="1" alt=""></td>
		    <td>
	        <img src="images/spacer.gif" width="56" height="1" alt=""></td>
		    <td>
	        <img src="images/spacer.gif" width="18" height="1" alt=""></td>
		    <td>
	        <img src="images/spacer.gif" width="105" height="1" alt=""></td>
	    </tr>
                        </table>
      </div>
		    <p align="center">&nbsp;</p>
			<p align="center">&nbsp;</p>
			<p align="center">&nbsp;</p>
			<p align="center">&nbsp;</p>
			<p align="center">&nbsp;</p>
			<p align="center">&nbsp;</p>
	        
      <div align="center">
        <!--                  -----------------------                    -->
              </div></td>
  </tr>
        </table>
        
      </div></td>
  </tr>
</table>
<?php include('footer.php'); ?>