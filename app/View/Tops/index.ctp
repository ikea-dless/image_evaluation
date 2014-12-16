<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
<style>
	body {
		margin: 50px 15px 15px 15px;
	}
</style>

<h3>ポスター印象評価のアンケート</h3>

<p>
このアンケートはポスターを見て、そのポスターの印象評価を調査するものです。
ポスターを見て各項目で一番当てはまるものを選んでください。
このアンケートで得られた個人情報は厳重に保管し、外部に漏れないことを約束します。
また、集計した結果は金沢工業大学のプロジェクトデザイン実践の授業で使用されます。
</p>

<?php
	$datas = array(
		'見やすい',
		'おいしそう',
		'健康に良さそう',
		'インパクトがある',
		'アルコール度数が高そう',
		'飲みやすそう',
		'わかりやすい',
		'買いたい',
		'女性向け',
		'あたたかい',
		'若者向け',
		'辛そう',
		'苦そう',
		'香りがよさそう',
		'飲みたい'
	);
	
	foreach ($datas as $key => $data) {
		echo "<p>".$data."</p>";
		echo "<div id=\"slider".++$key."\"></div>";
	}
?>
<button id="update" type="button" class="btn btn-primary btn-wide" style="width: 100%">送信</button>

<script>
	value = {};
	obj = {};
	for (count=1; count<16; count++) {
		obj[count] = 3;
		$("#slider" + count).bind( "slidechange", function(event, ui) {
			value[count] = ui.value;
			var div = this.id;
			var id = div.match(/\d+/);
			obj[id] = value[count];
		});
	}
	
	$("button#update").click(function() {
	    var button = $(this);
	    button.attr("disabled", true);
		$.ajax({
	        type : 'POST',
	        url : "http://" + location.hostname + "/anc/tops/submit",
	        data : obj,
	        scriptCharset: 'utf-8',
	        success : function(data) {
	            // Success
	            alert("success");
	            alert(JSON.stringify(obj));
	        },
	        error : function(data) {	
	            // Error
	            alert("error");
	            alert(JSON.stringify(obj));
	            $("#response").html(JSON.stringify(obj));
	        },
	        complete: function() {
            	button.attr("disabled", false);
        	}
	    });
	});
</script>

<?php echo $this->Html->script('application'); ?>