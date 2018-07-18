<style>
  select {
        width: 200px;
        float: left;
        min-height: 200px;
        font-size: 14px;
        line-height: 20px;
    }
    .controls {
        width: 130px;
        float: left;
        margin: 10px;
    }
    .controls a {
        border-radius: 4px;
        border: 0px solid #000;
        color: #ffffff;
        padding: 10px;
        font-size: 12px;
        text-decoration: none;
        display: inline-block;
        text-align: center;
        margin: 2px;
        width: 60px;
        float: left;
        font-family: 'open sans';
    }
</style>

<form method="post" onsubmit="return selectAll()">
  
    <select name="not_selected[]" multiple size="10" id="from" >
    <?php $qry="select page_id,name from pages_priority where priority=0";
      $data=fetchAll($qry);
      foreach ($data as $page) {
    ?>
      <option value="<?php echo $page['page_id'];?>"><?php echo $page['name'];?></option>
      <?php }?>
    </select>
  <div class="controls"> 
      <a href="javascript:moveSelected('from', 'to')"> 
        <span class="input-group-addon"  >
                <i class="glyphicon glyphicon-chevron-right" ></i> 
        </span>
      </a> 
      <a href="javascript:moveAll('from', 'to')">
        <span class="input-group-addon">
                <i class="glyphicon glyphicon-forward"></i> 
        </span>
      </a> 
      <a href="javascript:moveSelected('to', 'from')">
        <span class="input-group-addon">
                <i class="glyphicon glyphicon-chevron-left"></i> 
        </span>
      </a> 
      <a href="javascript:moveAll('to', 'from')" href="#">
        <span class="input-group-addon">
                <i class="glyphicon glyphicon-backward"></i> 
        </span>
      </a>     
    </div>
  
    <select multiple id="to" size="10" name="page_name[]">
      <?php 
        $qry="select page_id,name from pages_priority where priority!=0 order by priority";
        $data=fetchAll($qry);
        foreach ($data as $page) {
    ?>
      <option value="<?php echo $page['page_id'];?>"><?php echo $page['name'];?></option>
      <?php }?>
    </select>
    <div class="controls" > 
      <a href="javascript:moveUp()">
        <span class="input-group-addon">
                <i class="glyphicon glyphicon-arrow-up"></i> 
        </span>
      </a> 
      <a href="javascript:moveDown()">
        <span class="input-group-addon">
                <i class="glyphicon glyphicon-arrow-down"></i> 
        </span>
      </a>    
    </div>
    
    <input class="btn btn-primary" style="margin-left:15px" type="submit" value="Submit"  id="display-text">
  
    </form> 
<script>
  function moveAll(from, to) {
        $('#'+from+' option').remove().appendTo('#'+to); 
    }
    
    function moveSelected(from, to) {
        $('#'+from+' option:selected').remove().appendTo('#'+to); 
    }
    function selectAll() {
        $("select option").attr("selected","selected");
    }

     function moveUp()
        {
            var ddl = document.getElementById('to');
            //var size = ddl.length;
            //var index = ddl.selectedIndex;
            var selectedItems = new Array();
            var temp = {innerHTML:null, value:null};
            for(var i = 0; i < ddl.length; i++)
                if(ddl.options[i].selected)             
                    selectedItems.push(i);

            if(selectedItems.length > 0)    
                if(selectedItems[0] != 0)
                    for(var i = 0; i < selectedItems.length; i++)
                    {
                        temp.innerHTML = ddl.options[selectedItems[i]].innerHTML;
                        temp.value = ddl.options[selectedItems[i]].value;
                        ddl.options[selectedItems[i]].innerHTML = ddl.options[selectedItems[i] - 1].innerHTML;
                        ddl.options[selectedItems[i]].value = ddl.options[selectedItems[i] - 1].value;
                        ddl.options[selectedItems[i] - 1].innerHTML = temp.innerHTML; 
                        ddl.options[selectedItems[i] - 1].value = temp.value; 
                        ddl.options[selectedItems[i] - 1].selected = true;
                        ddl.options[selectedItems[i]].selected = false;
                    }
        }

        function moveDown()
        {
            var ddl = document.getElementById('to');
            //var size = ddl.length;
            //var index = ddl.selectedIndex;
            var selectedItems = new Array();
            var temp = {innerHTML:null, value:null};
            for(var i = 0; i < ddl.length; i++)
                if(ddl.options[i].selected)             
                    selectedItems.push(i);

            if(selectedItems.length > 0)    
                if(selectedItems[selectedItems.length - 1] != ddl.length - 1)
                    for(var i = selectedItems.length - 1; i >= 0; i--)
                    {
                        temp.innerHTML = ddl.options[selectedItems[i]].innerHTML;
                        temp.value = ddl.options[selectedItems[i]].value;
                        ddl.options[selectedItems[i]].innerHTML = ddl.options[selectedItems[i] + 1].innerHTML;
                        ddl.options[selectedItems[i]].value = ddl.options[selectedItems[i] + 1].value;
                        ddl.options[selectedItems[i] + 1].innerHTML = temp.innerHTML; 
                        ddl.options[selectedItems[i] + 1].value = temp.value; 
                        ddl.options[selectedItems[i] + 1].selected = true;
                        ddl.options[selectedItems[i]].selected = false;
                    }
        }

    document.getElementById('display-text').onclick = function () {
    var i;
    var x = document.getElementById("from");
    var not_selected = new Array();
    for (i = 0; i < x.length; i++) {
      not_selected[i]=x.options[i].value;
    }

    var y = document.getElementById("to");
    
    var page_name = new Array();
    for (i = 0; i < y.length; i++) {
      page_name[i]=y.options[i].value;
    }
    var ors="";
    $.ajax({
      url:"module/page/page_priority.php",
      data:"not_selected="+not_selected+"&page_name="+page_name,
      type:'POST',
      success: function(rs){
      }
    });
  }

</script>
<div class="clearfix">  </div>