<div id="content" class="col-full">
        <script type="text/javascript">
        function showUser()
        {

          xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange=function()
          {
          if (xmlhttp.readyState==4 && xmlhttp.status==200)
            {
            document.getElementById("other-post").innerHTML=xmlhttp.responseText;
            }
          }
           
        xmlhttp.open("GET","http://localhost/alwayseveryday/news/listdir",true);
        xmlhttp.send();
        }
        </script>
		<div id="main" class="col-left">
                                                                                                       
                <div class="post">
		    
                    <h2 class="title"><?php echo $ftitle ; ?></h2>
                    
                    <p class="date">
                    	<span class="day"><?php echo date('d', $fdate); ?></span>
                    	<span class="month"><?php echo date('F', $fdate); ?></span>
                    </p>
                    
                                        
                    <div class="entry">
                		<p><?php echo $fposting; ?></p>
		    </div>
		    
                </div><!-- /.post -->                              
                    <div id="other-post"><div>
                    <a onclick="showUser()">click</a>
        
                <div class="more_entries">
                    <div class="fl"></div>
		    <div class="fr"></div>
                    <br class="fix">
                </div>		
                
		</div><!-- /#main -->
