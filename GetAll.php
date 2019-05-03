<?php include 'header.php'; ?>
<div id="mytable">
    
</div>
<div id="chart-conteiner">
    <canvas id="mycanvas"></canvas>
</div>
<form class="container-fluid">
    <div id="in" class="form-group" >
		<div class="ex">
			<div class="med"><label for="inputrec">Id</label></div>
			<div><input type="text" class="form-control" id="inputrec"  placeholder = "Enter your id">
			</div>
		</div>
		<div class="ex">
			
			<div class="med"><label for="inputdatea">Date After</label></div>
			<div><input class="form-control" class='pole' id="inputdatea" type='date'  name='datea'>
			</div>
		</div>
		<div class="ex">
			<div class="med"><label for="inputdateb">Date Before</label></div>
			
			<div><input class="form-control" class='pole' id="inputdateb" type='date'  name='datea'></div>
		</div>
	</div>
	
    

       
		
		<div class="form-group">
			<div class="form-check form-check-inline">
				<input class="form-check-input" type="radio" name="rFilter" id="rFilW" value="Week">
				<label class="form-check-label" for="rFilW">Week</label>
			</div>
			<div class="form-check form-check-inline">
				<input class="form-check-input" type="radio" name="rFilter" id="rFilM" value="Month">
				<label class="form-check-label" for="rFilM">Month</label>
			</div>
			<div class="form-check form-check-inline">
				<input class="form-check-input" type="radio" name="rFilter" id="rFilY" value="Year">
				<label class="form-check-label" for="rFilY">Year</label>
			</div>
        </div>
    
	<div id="but"><button type="button" class="btn btn-outline-secondary" onclick="getChart()">Ok</button></div>
</form>  
</div>
<?php include 'footer.php'; ?>