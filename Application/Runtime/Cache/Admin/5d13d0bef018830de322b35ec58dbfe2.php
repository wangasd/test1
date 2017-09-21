<?php if (!defined('THINK_PATH')) exit();?>

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <style>
	    .div{
	        margin: 20px auto;
	        width: 500px;
	        border:1px solid #f00;
	    }


	    table{
	        width:100%;
	        text-align: center;
	        height:400px;
	        border-collapse: collapse;
	    }

	    #J_tips{
	    	  display: none;
			  width:200px; 
			  min-height:53px; 
			  padding:10px;
			  border: 1px solid #5e4e3f;
		      position: absolute;
	          z-index: 99;
	          background: rgba(0,0,0,0.5);
	          color: #fff;
		}
		.help{
			color:#f00;
		}
    </style>
</head>
<body>

<div class="div">
<div class="box1">	
	CSS 为定位和浮动
	<span class="help" id="help-3">???</span>提供了一些属

        
        <table border="1">
         
        <div id="search">
        	
        </div>

            <tr>
                <td colspan="2">
                    <input type="text" id="k2"></input>
                    <button id="k1">搜索</button>
                </td>
            </tr>
        </table>

    </div>
</div>





<div></div>

<script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>

<script type="text/javascript">


	$('#k1').on('click',function () {
	    var sjstr = sessionStorage.getItem('jstr')
        var jobj  = JSON.parse(sjstr);
        // console.log(jobj);
        keys = $('#k2').val()
        // console.log(keys)
        search(keys);


		
	})

function search(k){
	var sjstr = sessionStorage.getItem('jstr')
    var words = JSON.parse(sjstr);
    var tr = '<table border="1">';
    $.each(words,function(i,v){
    	string = v.words
    	if(string){
	    	var sp = string.split(k)

	    	if(sp.length>1){
	    		
		    	var jo = sp.join('<span style="background:#cfc;">' + k + '</span> ')

		    	tr    += '<tr>' +
		                	'<td id="id_' + i + '">' + string + '</span></td>' +
		                 	'<td>' + jo +'</td>' +
		                 '</tr>'		
	    	}

    	}
    })
    tr +='</table>'
    $('#search').html(tr)





	}



	// ajax
	$(function(){

	    $.ajax({

	        // 'url'  :'/index.php/Admin/goods/get_list',
	        'url'  :'/index.php/Admin/index/json',
	        'type' :'get',
	        'data' :{
	            // 'username':$('#username').val(),
	            // 'password':$('#password').val(),
	            // 'verify':  $('#verify').val()
	            },
	        'success':function (response) {
	            var jstr = JSON.stringify(response.data);

	            sessionStorage.setItem("jstr", jstr);

	            // var sjstr = sessionStorage.getItem('jstr')
	            // var jobj  = JSON.parse(sjstr);

	            // console.log(jobj);
	            // console.log(sjstr);

	            }
	    });















		// 显示控件

		var $doc = $('.help');
        var $msg = $('#J_msg');
        var $tips = $('#J_tips');
        if (!$tips.length) {
            $tips = $('<div id="J_tips" class="tips"> <div id="inserdiv"></div><button onclick="javascript:alertinfo()">编辑</button><button onclick="javascript:closeinfo()">删除</button></div>');
            $('body').append($tips);
        }

        $doc.on('mouseup', function(e) {

        	// 获取被点击的元素
        	console.log(e.target);
        	var help_id = $(e.target).attr('id')
        	console.log(help_id);
        	
            var pageX = e.pageX,
                pageY = e.pageY;

            $tips.css({
                top: pageY,
                left: pageX
            });

            $tips.show();

            $('#inserdiv').html('数据正在加载...')

        });

        $(document).mousedown(function(e){
			if($(e.target).parent("#J_tips").length==0){
				$("#J_tips").hide();
			}
		})







	        
});
</script>