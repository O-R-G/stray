<?  
	
?>
<script type="text/javascript">
	var wW = window.innerWidth;
	var wH = window.innerHeight;

	var popup = [
		{
			'url': '/slide-image',
			'name': 'wetwords-image',
			'param': 'width=600,height=450',
			'repeat': 1
		},
		{
			'url': '/slide-text',
			'name': 'wetwords-slide',
			'param': 'width=450,height=300',
			'repeat': 1
		},
		{
			'url': '/letter',
			'name': 'letter',
			'param': 'width=450,height=300',
			'repeat': 1
		}
	];
	var popup_w_min = 200;
	var popup_w_max = 750;
	var popup_h_min = 200;
	var popup_h_max = 750;
	var popup_top_min = 0.1 * wH;
	var popup_top_max = 0.5 * wH;
	var popup_left_min = 0.1 * wW;
	var popup_left_max = 0.5 * wW;

	for(i = 0; i < popup.length ; i++){
		for(j = 0; j < popup[i]['repeat']; j++){
			var this_top = parseInt( Math.random() * (popup_top_max - popup_top_min)) + popup_top_min;
			var this_left = parseInt( Math.random() * (popup_left_max - popup_left_min)) + popup_left_min;
			var this_param = popup[i]['param']+',top='+this_top+',left='+this_left;
			window.open(popup[i]['url'], popup[i]['name']+j, this_param);
		}
	}
	
</script>
<!-- <div id = 'control_display'></div> -->
<div id="home_container">
	<div id = 'colophon_container'>
		<div class = 'colophon_row'>
			<p class='colophon_year'>June 2014</p><p class='colophon_text'> Attend first performance of EARLY SHAKER SPIRITUALS at The Performing Garage, NY</p>
		</div>
		<div class = 'colophon_row'>
			<p class='colophon_year'>Jan 2014</p><p class='colophon_text'>Attend second performance of EARLY SHAKER SPIRITUALS at REDCAT in Los, Angeles, California</p>
		</div>
		<div class = 'colophon_row'>
			<p class='colophon_year'>Feb 2016</p><p class='colophon_text'>Grace Dunham reads at Poetic Research Bureau, Los Angeles, CA</p>
		</div>
		<div class = 'colophon_row'>
			<p class='colophon_year'>July 2016</p><p class='colophon_text'>Travel from Los Angeles to Guilford, CT to meet and record Susan Howe</p>
		</div>
		<div class = 'colophon_row'>
			<p class='colophon_year'>July 2017</p><p class='colophon_text'>STRAY the solo exhibition opens at Eva Presenhuber Gallery, NY</p>
		</div>
		<div class = 'colophon_row'>
			<p class='colophon_year'>Sept 2017</p><p class='colophon_text'>SE meets Kate Valk and Cynthia Hedstrom at The Performing Garage, NY<br>Record Howe’s reading from DEBTHS at Poet’s House, NY </p>
		</div>
		<div class = 'colophon_row'>
			<p class='colophon_year'>Dec 2017</p><p class='colophon_text'>Attend fourth performance EARLY SHAKER SPIRITUALS at The Performing Garage, NY<br>SE photographs stage for first time at The Performing Garage, NY</p>
		</div>
		<div class = 'colophon_row'>
			<p class='colophon_year'>Oct 2017</p><p class='colophon_text'>Performances of THE B-SIDE at The Performing Garage<br>SE photographs stage day after attending performance</p>
		</div>
		<div class = 'colophon_row'>
			<p class='colophon_year'>Feb 2018</p><p class='colophon_text'>Performances of THE B-SIDE at the Creative Arts Initiative, University at Buffalo, Buffalo, New York<br>SE photographs video monitor of Eric Berryman’s ghostly shadow singing via 
			livestream.</p>
		</div>
		<div class = 'colophon_row'>
			<p class='colophon_year'>March 2018</p><p class='colophon_text'>Travel to Durham, NC to meet and record Nathaniel Mackey</p>
		</div>
		<div class = 'colophon_row'>
			<p class='colophon_year'>July 2018</p><p class='colophon_text'>Returns to The Performing Garage to photograph the EARLY SHAKER SPIRITUALS stage upright.</p>
		</div>
		<div class = 'colophon_row'>
			<p class='colophon_year'>July 2018</p><p class='colophon_text'>Travels to Liverpool Biennial to exhibit THE SEVEL SLEEPERS + audio<br>new audio recordings of Nathaniel Mackey in the Blue Coat garden.</p>
		</div>
		<div class = 'colophon_row'>
			<p class='colophon_year'>Feb 2019</p><p class='colophon_text'>Exhibits A GRAPHIC TONE at kaufmann repetto, Milan<br>Exhibits STRAY: A GRAPHIC TONE at Cantor Arts Center, Stanford University, CA<br>Releases poetry LP STRAY: A GRAPHIC TONE featuring Susan Howe and 
			Nathaniel Mackey with interviews and examples of their poems in print </p>
		</div>
		<div class = 'colophon_row'>
			<p class='colophon_year'>June 2019</p><p class='colophon_text'>Records Nate Wooley playing trumpet solo of FAREWELL EARTHLY JOY, a Shaker Spiritual at future home of New-York-Consolidated</p>
		</div>
		<div class = 'colophon_row'>
			<p class='colophon_year'>Nov 2019</p><p class='colophon_text'>Exhibits WET WORDS IN A HOT FIELD at Altman Siegel Gallery, SF</p>
		</div>
	</div>
</div>   
<!-- <script src='/static/js/json.js'></script> -->
<!-- <script src='/static/js/msgs.js'></script> -->

