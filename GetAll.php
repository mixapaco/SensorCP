<?php include 'header.php'; ?>
<div>
    <div style="
    display: flex;
    justify-content: center;    
    padding-right: 17px;">
    <table style="border:1px solid black;">
        <thead>
            <tr>
                <th class="cell">1</th>
                <th class="cell">2</th>
                <th class="cell">3</th>
                <th class="cell">4</th>
            </tr>
        </thead>
    </table>
    </div>

<div id="mytable" >
</div>
</div>
<div id="chart-conteiner">
    <canvas id="mycanvas"></canvas>
</div>

<form id="form" class="container-fluid" action="Getjson.php">
    <div id="flex-wrap" class="form-group">
		<div class="rows">
			<div class="labelforinput">	
				<label for="inputrec">Id</label>
			</div>
			<div>
				<input id="inputrec" class="form-control same-input" type="text" placeholder = "Enter your id">
			</div>
		</div>
		<div class="rows">
			<div class="labelforinput">
				<label for="inputdatea">Date After</label>
			</div>
			<div>
				<input id="inputdatea" class="form-control same-input" type='date' name='datea' onclick="uncheckIfDate()">
			</div>
		</div>
		<div class="rows">
			<div class="labelforinput">
				<label for="inputdateb">Date Before</label>
			</div>
			<div>	
				<input id="inputdateb" class="form-control same-input" type='date' name='dateb' onclick="uncheckIfDate()">
			</div>
		</div>
	</div>

	<div id="forradio" class="form-group">
		<div class="form-check form-check-inline">
			<input id="rFilW" class="form-check-input" type="radio" name="rFilter" value="Week">
			<label class="form-check-label" for="rFilW">Week</label>
		</div>
		<div class="form-check form-check-inline">
			<input id="rFilM" class="form-check-input" type="radio" name="rFilter" value="Month">
			<label class="form-check-label" for="rFilM">Month</label>
		</div>
		<div class="form-check form-check-inline">
			<input id="rFilY" class="form-check-input" type="radio" name="rFilter" value="Year">
			<label class="form-check-label" for="rFilY">Year</label>
		</div>
	</div>
    <div id="requestbutton"><button id="confirm" class="btn btn-outline-secondary" type="button"  onclick="getChart()">Ok</button></div>
</form>  
</div>
<?php include 'footer.php'; ?>