<?
include('header.php');
include('settings.inc');
//$message = $_REQUEST['msg'];
//$show = $_GET['show'];


//echo "test";

if($_GET['mode']=="active")
{
	$mem_name=$_GET['mem_name'];
	$statuse = "active";
	$enrolled_id = $_GET['enrolled_id'];
	$sql="update members set statuse ='".$statuse ."' where mem_name ='".$mem_name."' and enrolled_id='".$enrolled_id."'"
	or die(mysqli_error()) ;
	$update_sql=mysqli_query($conn,$sql);
	$s_bonus="80";
	$t_bonus="60";
	$e_bonus="500";
	$c_bonus="600";
	
	$sql="select * from members where username='".$mem_name."' and pwd='".$pwd."' and enrolled_id='".$enrolled_id."'"
	or die(mysqli_error()) ;
	$query=mysqli_query($conn,$sql);
	$result=mysqli_fetch_array($query);
	$mem_name=$result['mem_name'];
	$enrolled_id=$result['enrolled_id'];
	$enroller_id_c=$result['enroller_id'];
	$message="Data Updated Successfully to Active";
	
	
	
	$sql="select * from members where username='".$mem_name."' and pwd='".$pwd."' and enrolled_id='".$enrolled_id."'"
	or die(mysqli_error()) ;
	$query=mysqli_query($conn,$sql);
	$result=mysqli_fetch_array($query);
	$enrolled_id_sub=$result['enrolled_id'];
	
	
	//accounts setup
	
	//SELECT * from members 
	$query="select * from ".$mem_name." ORDER BY id DESC LIMIT 1";
	$result = mysqli_query($conn,$query);
	$results=mysqli_fetch_array($result);
	$mem_name=$results['mem_name'];
	$enrolled_id=$results['enrolled_id'];
	$enroller_id=$results['enroller_id'];
	$cycle_id=$results['cycle_id'];
	$id=$results['id'];
	$id2=$results['id2'];
	$binary_rank=$results['binary_rank'];
	$starter="Starter";
	$team_builder="Team_Builder";
	

		

	///    LOP for binary_rank_final will be creatd as i know about the rank ///
	if($binary_rank==NULL)
	{
	$binary_rank_final="Starter";
	}
	else
	{
		if($binary_rank==$starter && $id2>6)
		{
			$binary_rank_final="Team_Builder";
		}
		else
		{
			if($binary_rank==$team_builder && $id2>6)
			{
				$binary_rank_final="Executive";
			}
			else
			{
				$binary_rank_final=$binary_rank;
			}
			
			
		}
	}
	
	
	
	///    LOP for binary_rank_final will be creatd as i know about the rank ///
	
	if($cycle_id==NULL)
	{
	$cycle_id_final="cycleid1";
	}
	else
	{
		if($id>=6)
			{
			$cycle_id2=str_replace("cycleid", "", $cycle_id);
			$cycle_id3=$cycle_id2+1;
			$cycle_id4="cycleid";
			$cycle_id_final=$cycle_id4.$cycle_id3;
			$id_final=1;
			//$id_final=1
			}
		else
			{
			$cycle_id_final=$cycle_id;
			$id_final=$id2+1;
			}
	}
	
	
	

	
	///////////////   sum of left ids and right ids ////////////////////
	
	$lid2 =mysqli_query($conn,"SELECT SUM(left_id) FROM ".$mem_name." WHERE cycle_id =".$cycle_id."") or die(mysqli_error());
	$lresult = mysql_result($lid2, 0);
	$lid=$lresult;
	
	$rid2  =mysqli_query($conn,"SELECT SUM(right_id) FROM ".$mem_name." WHERE cycle_id =".$cycle_id."") or die(mysqli_error());
	$rresult = mysql_result($rid2, 0);
	$rid=$rresult;


	/*	$query  =mysqli_query($conn,"SELECT SUM(tapi) FROM item_list WHERE invoiceno =".$invoiceno."") or die(mysqli_error());
	$result = mysql_result($query, 0);																			*/
	if($id2<6)
	{
	$lid_final="1";
	$rid_final="1";
	}
	
	///      NEW MEMBER BONUS
	$sqltt="insert into commisions(mem_name,date,enroller_id,enrolled_id,amt)
	values('".$mem_name."','".$date."','".$enroller_id."','".$enrolled_id."','".$s_bonus."') 
	where enroller_id='".$enroller_id_c."'";
	$result = mysqli_query($conn,$sqltt)or die(mysqli_error());
	
	
	// NEW SUB MEMBER BONUS
	
	$sqltt="insert into commisions(mem_name,date,enroller_id,enrolled_id,amt)
	values('".$mem_name."','".$date."','".$enroller_id."','".$enrolled_id."','".$t_bonus."')
	where enroller_id='".$enrolled_id_sub."'";
	$result = mysqli_query($conn,$sqltt)or die(mysqli_error());
	
	
	
	
	if(id2==3 && $lid==3 && $rid==3)
	{
	$sqltt="insert into commisions(mem_name,date,enroller_id,enrolled_id,amt)
	values('".$mem_name."','".$date."','".$enroller_id."','".$enrolled_id."','".$e_bonus."')
	where enroller_id='".$enrolled_id_sub."'";
	$result = mysqli_query($conn,$sqltt)or die(mysqli_error());
	}
	
	if(id2==6 && $lid==6 && $rid==3)
	{
	$sqltt="insert into commisions(mem_name,date,enroller_id,enrolled_id,amt)
	values('".$mem_name."','".$date."','".$enroller_id."','".$enrolled_id."','".$c_bonus."')
	where enroller_id='".$enrolled_id_sub."'";
	$result = mysqli_query($conn,$sqltt)or die(mysqli_error());
	}
	
	if(id2==6 && $lid==3 && $rid==6)
	{
	$sqltt="insert into commisions(mem_name,date,enroller_id,enrolled_id,amt)
	values('".$mem_name."','".$date."','".$enroller_id."','".$enrolled_id."','".$c_bonus."')
	where enroller_id='".$enrolled_id_sub."'";
	$result = mysqli_query($conn,$sqltt)or die(mysqli_error());
	}
	
	
	
	
	
	
	
	
	////   COMISSON MODULE ENDS   ////
	
	
$sqlw="insert into ".$mem_name." (left_id,right_id,id2,cycle_id,enroller_id,enrolled_id,binary_rank)
	values('".$lid_final."','".$rid_final."','".$id_final."','".$cycle_id_final."','".$enroller_id."','".$enrolled_id."','".$binary_rank_final."')";
	
$result = mysqli_query($conn,$sqlw)or die(mysqli_error());
		
	if($id2==6 && $lid==6 && $rid>3)
	{
		$rid_final2=$rid-3;
		$lid_final="1";
		$rid_final="1";
		
	}
	else
	{
		if($id2==6 && $rid==6 && $lid>3)
		{
			$lid_final2=$lid-3;
			$lid_final="1";
			$rid_final="1";	
		}
		else
		{
			if($id2==6 && $lid==6 && $rid==3)
				{
					$lid_final="1";
					$rid_final="1";
				}
			else
			{
				if($id2==6 && $rid==6 && $lid==3)
				{
					$lid_final="1";
					$rid_final="1";
				}
				else
				{
				if($id2<6 || $id2>6)
				{
				$lif_final="1";
				$rid_final="1";
				}
				}
				
				
				
			
				
			
			}
				
		}
		}
		
		
	///////////////     condition if left id or right id = 1,2,3    ///////////////	
		
	
	
	
	
	if($lid_final2==1 || $rid_final2==1)
	{
		$sqlwsw="insert into ".$mem_name." (left_id, right_id,$id2,$cycle_id)
				
				values('".$lid_final."','".$rid_final."','".$cycle_id."')";
				$result = mysqli_query($conn,$sqlwsw)or die(mysqli_error());
	}
	else
	{
		if($lid_final2==2 || $rid_final2==2)
		{
		$sqlwsw="insert into ".$mem_name." (left_id, right_id,$id2,$cycle_id)
				values('".$lid_final."','".$rid_final."','".$cycle_id."')";
				$result = mysqli_query($conn,$sqlwsw)or die(mysqli_error());
				
				$sqlws="insert into ".$mem_name." (left_id, right_id,$id2,$cycle_id)
				values('".$lid_final."','".$rid_final."','".$cycle_id."')";
				$result = mysqli_query($conn,$sqlws)or die(mysqli_error());
		}
		else
		{
			if($lid_final2==3 || $rid_final2==3)
			{
				$sqlwsw="insert into ".$mem_name." (left_id, right_id,$id2,$cycle_id)
				values('".$lid_final."','".$rid_final."','".$cycle_id."')";
				$result = mysqli_query($conn,$sqlwsw)or die(mysqli_error());
				
				$sqlws="insert into ".$mem_name." (left_id, right_id,$id2,$cycle_id)
				values('".$lid_final."','".$rid_final."','".$cycle_id."')";
				$result = mysqli_query($conn,$sqlws)or die(mysqli_error());
				
				$sqlw="insert into ".$mem_name." (left_id, right_id,$id2,$cycle_id)
				values('".$lid_final."','".$rid_final."','".$cycle_id."')";
				$result = mysqli_query($conn,$sqlw)or die(mysqli_error());

		}
	
	}
	}
	}
	
	



if($_GET['mode']=="deactive")
{
	$mem_name=$_GET['mem_name'];
	$statuse = "deactive";
	$enrolled_id = $_GET['enrolled_id'];
	$sql="update members set statuse ='".$statuse ."' where mem_name ='".$mem_name."' and enrolled_id='".$enrolled_id."'"
	or die(mysqli_error()) ;
	$update_sql=mysqli_query($conn,$sql);
	$message="Data Updated Successfully to Deactive";
	
	
	
	
	
}


$rowsPerPage = 10;
$pageNum = 1;
if(isset($_GET['page']))
{
    $pageNum = $_GET['page'];
}
$offset = ($pageNum - 1) * $rowsPerPage;



?>


<link href="admin/style2.css" rel="stylesheet" type="text/css">


<body bgcolor="#666666" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table width="990" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr> 
    <td width="200" valign="top" bgcolor="#FFFFFF"> 
            <?php include('categoryside.php'); ?>
             </td>
            <td width="77%" valign="top" bgcolor="#FFFFFF"> <br><br>
             <form method="post" action="" name="articlelist">
              <table width="95%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#D4D4C8">
                <?php
				if($message != "")
				{
				?>
                <tr> 
                  <td height="19" colspan="3" align="center" bgcolor="#EFEFE7" class="blue_txt"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong><?php echo $message;?> 
                    </strong></font></td>
                </tr>
                <?php
				}
				?>
                <!--<tr> 
                  <td height="19" colspan="3" align="center" bgcolor="#EFEFE7" class="blue_txt"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong> 
                    <a href="list_form.php?show=a">A</a> <a href="list_form.php?show=b">B</a> 
                    <a href="list_form.php?show=c">C</a> <a href="list_form.php?show=d">D</a> 
                    <a href="list_form.php?show=e">E</a> <a href="list_form.php?show=f">F</a> 
                    <a href="list_form.php?show=g">G</a> <a href="list_form.php?show=h">H</a> 
                    <a href="list_form.php?show=i">I</a> <a href="list_form.php?show=j">J</a> 
                    <a href="list_form.php?show=k">K</a> <a href="list_form.php?show=l">L</a> 
                    <a href="list_form.php?show=m">M</a> <a href="list_form.php?show=n">N</a> 
                    <a href="list_form.php?show=o">O</a> <a href="list_form.php?show=p">P</a> 
                    <a href="list_form.php?show=q">Q</a> <a href="list_form.php?show=r">R</a> 
                    <a href="list_form.php?show=s">S</a> <a href="list_form.php?show=t">T</a> 
                    <a href="list_form.php?show=u">U</a> <a href="list_form.php?show=v">V</a> 
                    <a href="list_form.php?show=w">W</a> <a href="list_form.php?show=x">X</a> 
                    <a href="list_form.php?show=y">Y</a> <a href="list_form.php?show=z">Z</a> 
                    <a href="list_form.php">All</a></strong></font></td>
                </tr>-->
                <tr> 
                  <td height="19" colspan="3" bgcolor="#EFEFE7" class="blue_txt"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>:: 
                    &nbsp;View Profile</strong></font></td>
                </tr>
                <tr> 
                  <td height="15" colspan="3" bgcolor="#FFFFFF" class="blue_txt"><div align="justify"><font size="1" face="Verdana, Arial, Helvetica, sans-serif"> 
                      The following desciption is there -</font></div></td>
                </tr>
                <tr> 
                  <td width="73%" height="15" bgcolor="#FFFFFF" class="blue_txt">
                    <div align="left"><font color="#990000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong> 
                      Description</strong></font></div>
                  </td>
				  <td width="13%" align="center" bgcolor="#FFFFFF" class="blue_txt"><font color="#990000"><strong><font size="1" face="Verdana, Arial, Helvetica, sans-serif">statuse</font></strong></font></td>
                  <td width="13%" align="center" bgcolor="#FFFFFF" class="blue_txt"><font color="#990000"><strong><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Update statuse</font></strong></font></td>
				                   
                </tr>
                <?php 
					$query  = "SELECT * from members";
					$rs_order = mysqli_query($conn,$query);
					$num_rows = mysql_num_rows($rs_order);
			
				  $result = mysqli_query($conn,$query);
				 while ( $results = mysqli_fetch_array($result))
				 {
				 $mem_name=$results['mem_name'];
				 $enrolled_id=$results['enrolled_id'];
				 $statuse=$results['statuse'];
				 
					
				
				  ?>
                <tr> 
					<td height="15" bgcolor="#FFFFFF" class="blue_txt">
					<font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Company Name:</strong>
					
				<a href="<?php print "view_aging2.php?>"><?php echo $mem_name;?>&nbsp; </font></td>
                   <td align="center" bgcolor="#FFFFFF" class="blue_txt"><font color="#990000"><strong><font size="1" face="Verdana, Arial, Helvetica, sans-serif"><?php echo $statuse;?></font></strong></font></td>
					<td align="center" bgcolor="#FFFFFF" class="blue_txt">
<a href="<?php print "active_de_active_members.php?mode=active&mem_name=".$mem_name."&enrolled_id=".$enrolled_id; ?>">Actice</a><br>

<a href="<?php print "active_de_active_members.php?mode=deactive&mem_name=".$mem_name."&enrolled_id=".$enrolled_id;?>">Deactive</a>								
					 </td>
	
				</tr>
                <?
				  }
				  ?>
                <tr> 
                  <td height="15" colspan="3" align="center" bgcolor="#FFFFFF" class="blue_txt"> 
                    <font color="#000000"><strong><font size="1" face="Verdana, Arial, Helvetica, sans-serif"> 
                    <br>
                    </font><font color="#000000"><strong><font size="1" face="Verdana, Arial, Helvetica, sans-serif"> 
                    <?php

// how many pages we have when using paging?
$maxPage = ceil($num_rows/$rowsPerPage);


// creating 'previous' and 'next' link
// plus 'first page' and 'last page' link

// print 'previous' link only if we're not
// on page one
if ($pageNum > 1)
{
    $page = $pageNum - 1;
    $prev = " <a href=\"$self?page=$page\">[Prev]</a> ";
    
    $first = " <a href=\"$self?page=1\">[First Page]</a> ";
} 
else
{
    $prev  = ' [Prev] ';       // we're on page one, don't enable 'previous' link
    $first = ' [First Page] '; // nor 'first page' link
}

// print 'next' link only if we're not
// on the last page
if ($pageNum < $maxPage)
{
    $page = $pageNum + 1;
    $next = " <a href=\"$self?page=$page\">[Next]</a> ";
    
    $last = " <a href=\"$self?page=$maxPage\">[Last Page]</a> ";
} 
else
{
    $next = ' [Next] ';      // we're on the last page, don't enable 'next' link
    $last = ' [Last Page] '; // nor 'last page' link
}

// print the page navigation link
//echo $first . $prev . " Showing page <strong>$pageNum</strong> of <strong>$maxPage</strong> pages " . $next . $last;


?>
                    </font></strong></font><font size="1" face="Verdana, Arial, Helvetica, sans-serif"> 
                    </font></strong></font></td>
                </tr>
                
              </table>
              </form>
              
              <p>&nbsp;</p>
              <p>&nbsp;</p>
              <p>&nbsp;</p>
              <p>&nbsp;</p>
              <p>&nbsp;</p>
              <p>&nbsp;</p></td>
          </tr>
        </table>
        
      </div></td>
  </tr>
</table>
<?php include('footer.php'); ?>