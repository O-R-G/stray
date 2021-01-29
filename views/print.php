<?
	$text = $item['body'];
	$text .= '<div class = "appendix-begin"></div>';
	$appendix_id = end($oo->urls_to_ids(array('appendix')));
	$appendix_children = $oo->children($appendix_id);
	foreach($appendix_children as $child)
		$text .= $child['body'];
	$radio_words_raw = array(
		'STRAY ERR | STRAY (STRĀ) INTR.V. STRAYED, STRAY•ING, STRAYS 1A. TO MOVE AWAY FROM A GROUP, DEVIATE FROM THE CORRECT COURSE, OR GO BEYOND ESTABLISHED LIMITS. B. TO BECOME LOST. 2. TO WANDER ABOUT WITHOUT A DESTINATION OR PURPOSE; ROAM. SEE SYNONYMS AT WANDER. 3. TO FOLLOW A WINDING COURSE; MEANDER. 4. TO DEVIATE FROM A MORAL, PROPER, OR RIGHT COURSE; ERR. 5. TO BECOME DIVERTED FROM A SUBJECT OR TRAIN OF THOUGHT; DIGRESS: STRAYED FROM THE TOPIC. SEE SYNONYMS AT SWERVE. ◊ N. ONE THAT HAS STRAYED, ESPECIALLY A DOMESTIC ANIMAL WANDERING ABOUT. ◊ ADJ. 1. STRAYING OR HAVING STRAYED; WANDERING OR LOST: STRAY CATS AND DOGS. 2. SCATTERED OR SEPARATE: A FEW STRAY CRUMBS. [MIDDLE ENGLISH STRAIEN, FROM OLD FRENCH ESTRAIER, FROM ESTREE, HIGHWAY, FROM LATIN STRĀTA. SEE STREET.] — STRAY’ER | ENTER THE PHOTORAMA ΦΩΤΟΣ (PHŌTOS) GENITIVE OF ΦΩ͂ (PHŌS) LIGHT ΓΡΑΦΗ (GRAPHÉ) REPRESENTATION BY MEANS OF LINES" OR "DRAWING", TOGETHER MEANING DRAWING WITH LIGHT. MODIFICATION OF - ORAMA FROM ANCIENT GREEK ὍΡᾹΜᾸ, (HÓRĀMA, “SIGHT, SPECTACLE”) TEMPLE HI LO | STRAY | INDEFINITE TIME INDETERMINATE TIME DISPLACED TIME ABSTRACT TIME BILATERAL TIME TRANSMISSION TIME TRANSDUCED TIME | SINGULARITIES | ARTICULATION OF SOUND FORMS IN TIME | WHEN YOU WRITE A POEM YOU USE SOUNDS AND WORDS OUTSIDE TIME. YOU USE TIMELESS ARTICULATIONS. | SPLAY ANTHEM | SONG OF THE ANDOUMBOULOU 50 | ERODING WITNESS | SOUND AND SENTIMENT, SOUND AND SYMBOL | POETIC LANGUAGE IS LANGUAGE OWNING UP TO BEING AN ORPHAN, TO ITS TENUOUS KINSHIP WITH THE THINGS IT OSTENSIBLY REFERS TO. | THE POLITICS OF POETIC FORM: POETRY AND PUBLIC POLICY | FRIENDS IN DEED | FRIENDS IN DEED | FRIENDS IN DEED | GRACE WALKING AND TALKING | BOMBARDO | MY EMILY DICKINSON | MAGNALIA CHRISTI AMERICANA | BREATHING, BOMBS, SWORDS, DEATH, SPEARS AND FLAMES | WILL AND BE GOING TO | WILL | BE GOING TO | SIGNAL ESCAPES | SINGULARITIES | TREE ELLIPSES OR THE HOT WAR COUPLE',
		'THE SEVEN SLEEPERS | SEPTET FOR THE END OF TIME | SEPTET FOR THE END OF TIME | SEPTET FOR THE END OF TIME | SPLAY ANTHEM | SPLAY ANTHEM | BYG | ',
		'A SIDE / B SIDE | EARLY SHAKER SPIRITUALS, A RECORD ALBUM INTERPRETATION | THE B SIDE: NEGRO FOLKLORE FROM TEXAS STATE PRISONS | THE B SIDE | TWO PLAYS ABOUT AMERICAN FOLKLORE DRAWN OUT OVER TIME AND SPACE ONE BLACK AND ONE WHITE DISCREPANTLY ENGAGING AS NATHANIEL MACKEY WOULD CALL IT BOTH RECORD ALBUM INTERPRETATIONS BOTH REAL AND IMAGINED WALK THROUGH ONE DOOR INTO A CIRCLE IN A SQUARE INTO THE EARLY SHAKER SPIRITUALS A RITUAL COMMUNITY OF CAST OUTS FROM THE CHURCH OF ENGLAND FOR PRACTICING THEIR RADICAL BELIEFS SCORNED AND THREATENED THEY RESETTLED IN THE NEW AMERICAN WILDERNESS OF THE 18TH CENTURY SEEKING RELIGIOUS FREEDOM IN ECSTATIC SONG AND DANCE TO UNSETTLE AND UNRESTRELIGEOUS FORM. WALK THROUGH ANOTHER DOOR INTO ANOTHER CIRCLE INSIDE ANOTHER SQUARE IN THE BLACK BOX THEATER AND ENTER THE B SIDE: NEGRO FOLKLORE FROM TEXAS STATE PRISONS. ENTER A YOUNG ACTOR ALONE IN HIS BEDROOM TRANSCRIBING, RESEARCHING AND INTERPRETING WORK-SONGS, SPIRITUALS, BLUES AND TOASTS. CONVICT LYRICS AN AMERICAN ORAL TRADITION OF HARD LABOR ROOTED IN THE EARLY DAYS OF SLAVERY. | THE SENSATIONS | THE TRANSDUCTIONS | TRANSDUCTION AS IT RELATES TO THE PHYSIOLOGICAL FOLLOWS THESE PRINCIPAL STEPS OF SENSORY PROCESSING: SIGNAL (SUN OR LP) + COLLECTION (EYE OR CAMERA OR EAR) + TRANSDUCTION (NERVOUS SYSTEM) + PROCESSING (LISTENING) + ACTION (SONG).',
		'SPLAY ANTHEM | AMERICAN PHOTO - GRAPHS | AIDS | SOIL EROS - ION | SOIL EROSION | FSA | FSA | AMERICAN PHOTOGRAPHS | ION | ACTION | CONDITION | COMMUNION | UNION | SOIL EROSION | KNOCKING AROUND BETWEEN MONEY, SEX, AND BOREDOM: WALKER EVANS IN HAVANA AND NEW YORK | NOT LEAST SINCE THE YALE LECTURE ATTRACTED ITS SHARE OF OUTRAGE AND HATE MAIL. PERHAPS IT WAS TOO PROVOCATIVE FOR FORMER STUDENTS AND COLLEAGUES, RIGHT THERE WHERE HE HAD TAUGHT. YET, IT IS IN FACT THE HAGIOGRAPHIC VIEW OF EVANS THAT DIMINISHES HIM, RATHER THAN THE ATTEMPT TO PURSUE WHAT HAS BEEN EXCLUDED FROM THE APPROVED ENGAGEMENT WITH HIS PHOTOGRAPHS. HE IS SIMPLY NOT THE MONOLITHIC MORAL PARAGON OTHERS INVENTED––AND THAT, FOR ME, MAKES HIS WORK STRANGER AND MORE COMPELLING. | THE ORIGINAL CALL FOR SOIL EROSION SOUGHT TO MANEUVER AROUND ITS TITLE. IT SPOKE OF STATES EROSIONS, CLIMATE EROSIONS, CULTURAL EROSIONS AND SOCIAL EROSIONS. SOIL AS LAND, BODY AND SOILING. EROSION AS EROS, LOSS AND DESIRE AND ALSO THE POTENTIAL FOR NEW CLEARINGS. IN THE DAYS, WEEKS AND NOW YEARS FOLLOWING THE 2016 PRESIDENTIAL ELECTION, THIS PHRASEOLOGY HAS ENTERED SHIFTING LANDSCAPES THAT WITH EACH PASSING DAY GROW MORE AND MORE UNIMAGINABLE, WHERE ANY IDEA OF GROUND OR GROUNDING IS UNCLEAR AT BEST. TAKEN TOGETHER, THE WORK IN SOIL EROSION IS A COLLECTION OF THESE STARTING POINTS PLACED IN A LARGER NARRATIVE FIELD WHERE MEANING PLUS THE CULTURAL AND POLITICAL CIRCUMSTANCES OF OUR LIVING CONDITIONS GO TO WORK ON EACH OTHER TO CAST DOUBT AND SHORE UP NEW CERTAINTIES.',
		'A GRAPHIC TONE | SPLAY ANTHEM, NEW DIRECTIONS',
		'WET WORDS IN A HOT FIELD | WATER IN THE CAMERA IS A SIGN OF WHAT CAN HAPPEN WHEN WET WORDS ENTER A HOT FIELD. SUBJECTS WITHOUT CAMERAS IN A PLACE WITHOUT CAMERAS. SOME PEOPLE WILL SAY THAT THIS CAMERA IS A PRECISION INSTRUMENT BUT I SAY THAT THIS CAMERA IS AN INSTRUMENT FOR GOING STRAY. A CAMERA THAT IS STRAYING ON AN OBJECT OTHER THAN A HUMAN FACE MAY BE DETECTED AS A HUMAN FACE. | VIRTUAL HORIZONS IN EXPOSURE ZONES, NIGHT SCENES OR POINTS OF LIGHT, SUBJECTS IN LOW LIGHT, SUBJECTS AT THE EDGE OF THE PICTURE, SUBJECTS STRONGLY REFLECTING LIGHT, SUBJECTS MOVING DRAMATICALLY UP, DOWN, LEFT AND RIGHT, SUBJECTS THAT CHANGE SPEED AND MOVE ERRATICALLY, SUBJECTS APPROACHING OR MOVING AWAY FROM THE CAMERA, SUBJECTS AT THE EDGE OF THE PICTURE, SUBJECTS IN AN AUDIBLE FIELD, SUBJECTS GOING STRAY. | TOUCH THE SUBJECT TO FOCUS. GOING STRAY LIKE HAIRS ON THE NECK. PICTURE STRAY HAIRS CROSSING A SUBJECTS EYE AND THEN ERASING STRAY SUBJECTS FROM THE FRAME. HOW STRAY LIGHT REACHING THE IMAGE PLANE ENTERS THE CAMERA DURING EXPOSURE AND EVEN IF THE SUN IS SLIGHTLY AWAY FROM THE ANGLE OF VIEW IT MAY STILL CAUSE SMOKE OR FIRE. DRAGGING ON THE MONITOR WHILE LOOKING THROUGH THE VIEWFINDER STRAY SUBJECTS MOVING THROUGH THE FINDER MOVE WITH MANY SUBJECTS LOST & FOUND.'
	);
	$radio_words = '';
	foreach($radio_words_raw as $chapter){
		$chapter_temp = str_replace(' | ', ' ', $chapter);
		$radio_words .= $chapter_temp . ' ';
	}

	$letter_image_filenames = scandir('media/letters');
	$filenum_arr = array();
	foreach($letter_image_filenames as $filename){
		if(substr($filename, 0, 1) != '.'){
			$this_key = explode('-', $filename);
			$this_key = $this_key[0];
			if(isset($filenum_arr[$this_key]))
				$filenum_arr[$this_key] ++;
			else
				$filenum_arr[$this_key] = 1;
		}
	}

?>
<div id ='print_mask'>
	<p>PREPARING FOR PRINTING...</p>
</div>
<div class = 'print_content'>
	<section id="" class = 'print-content'>
		<div id = '' class = 'text-container window-container'><?
	            echo $text;
	    ?></div>
	</section>
</div>
<script src="/static/js/bindery.min.js"></script>
<script>
	var radio_words = '<?= $radio_words; ?>';
	var filenum_arr = <? echo json_encode($filenum_arr); ?>;
	var print_image_arr = [
		[ 
		// p1
			{
				id: 1,
				url: 'PHOTORAMA_10-inch.jpg',
				class: ['twoThirdWidth']
			}
		],
		[
		// p2
			{ 
				id: 2,
				url: 'PHOTORAMA_10-inch.jpg',
				class: ['twoThirdWidth']
			}, 
			{
				id: 3,
				url: 'TEMPLE-HIGH-AND-LO-20x13_10-inches.jpg',
				class: ['twoThirdWidth']
			}
		],
		[
		// p3
			{ 
				id: 4,
				url: 'pp_to print_IMG_0423.jpg',
				class: ['centeredHorizontal','halfWidth']
			}
		],
		[
		// p4
			{ 
				id: 5,
				url: 'STRAY-SH.jpg',
				class: ['halfWidth']
			},
			{ 
				id: 6,
				url: 'STRAY-NM.jpg',
				class: ['halfWidth']
			}
		],
		[
		// p5
			{ 
				id: 7,
				url: 'friendsInDeedHouse-1.jpg',
				class: ['centeredFullPage', 'fullWidth']
			}
		],
		[
		// p6
			{ 
				id: 8,
				url: 'Grace-Walking-and-Talking.jpg',
				class: ['twoThirdWidth']
			},
			{
				id: 9,
				url: 'BOMBARDO_fnl_10 inch.jpg',
				class: ['twoThirdWidth']

			},
			{ 
				id: 10,
				url: 'WILL-AND-BE-GOING-1-v2-fnl_10-inch.jpg',
				class: false
			},
			{ 
				id:11,
				url: 'WILL-AND-BE-GOING-2-v2-fnl_10-inch.jpg',
				class: false
			}
		],
		[
		// p7
			
			{ 
				id:12,
				url: 'signal-escapes-v1.jpg',
				class: false
			},
			{ 
				id:13,
				url: 'TREE-ELLIPSE-1-IMG_0431-fnl-16INCHES_10-inches.jpg',
				class: ['halfWidth']
			},
			{ 
				id:14,
				url: 'TREE-ELLIPSE-2_10-inches.jpg',
				class: ['halfWidth']
			}
		],
		[
		// p8
			{ 
				id:15,
				url: 'Exh-view_Ebner_GEP_NY_2017_08.jpg',
				class: false
			},
			{ 
				id:16,
				url: 'Elliman_LB18-scrambled-bag-2.jpg',
				class: false
			}
		
		],
		[
		// p9
			{ 
				id:17,
				url: 'SEVEN-SLEEPERS-DOOR.jpg',
				class: false
			},
			{ 
				id:18,
				url: 'seven-sleepers-FNL-1-working-FNL-FNL.jpg',
				class: false
			},
			{ 
				id:19,
				url: 'seven-sleepers-FNL-2-working-FNL-FNL.jpg',
				class: false
			},
			{ 
				id:20,
				url: 'seven-sleeprs-FNL-3-working-FNL-FNL.jpg',
				class: false
			}
		
		],
		[
		// p10
			{ 
				id:21,
				url: 'quick_IMG_2222.jpg',
				class: ['twoThirdWidth']
			}
		
		],
		[],
		[
		// p12
			{ 
				id:22,
				url: 'SE_Shaker_HIRES_LAYOUT_V2_57x78_Final.jpg',
				class: false
			},
			{ 
				id:23,
				url: 'SE_bside_INVERTED_V3_16x18_Final.jpg',
				class: ['halfWidth']
			},
			{ 
				id:24,
				url: 'ghost-song.jpg',
				class: ['fullWidth']
			}
		
		],
		[	
		// p13
			{ 
				id:25,
				url: 'SE_Record_IMG_5615_V2_42x50_Final.jpg',
				class: ['centeredHorizontal']
			},
			{ 
				id:26,
				url: 'on-trespassing.png',
				class: false
			},
			{ 
				id:27,
				url: 'SE_cc_ps_grain_IMG_5758_V1_26x40_Final.jpg',
				class: false
			},
			{ 
				id:28,
				url: 'SE_cc_ps_grain_IMG_5762_V1_26x40_Final.jpg',
				class: false
			},
			{ 
				id:29,
				url: 'SE_cc_ps_grain_IMG_5756_VOG_26x40_Final.jpg',
				class: false
			}
		
		],
		[	
		// p13
			{ 
				id:30,
				url: 'signal-escapes-2-v2.png',
				class: ['centeredHorizontal', 'halfWidth']
			},
			{ 
				id:31,
				url: 'STUDIO-PLACARD_10-inches.jpg',
				class: false
			}
		
		],
		[	
		// p13
			{ 
				id:32,
				url: '4_Shannon_26.jpg',
				class: ['print-americanphotographs-item']
			},
			{ 
				id:33,
				url: '4_Shannon_30.jpg',
				class: ['print-americanphotographs-item']
			},
			{ 
				id:34,
				url: '2_Shannon_25.jpg',
				class: ['print-americanphotographs-item']
			},
			{ 
				id:35,
				url: '2_Shannon_18.jpg',
				class: ['print-americanphotographs-item']
			},
			{ 
				id:36,
				url: '1_Shannon_6.jpg',
				class: ['print-americanphotographs-item']
			},
			{ 
				id:37,
				url: '1_Shannon_17.jpg',
				class: ['print-americanphotographs-item']
			},
			{ 
				id:38,
				url: '4_Shannon_19.jpg',
				class: ['print-americanphotographs-item']
			},
			{ 
				id:39,
				url: '2_Shannon_31.jpg',
				class: ['print-americanphotographs-item']
			},
			{ 
				id:40,
				url: '4_Shannon_2.jpg',
				class: ['print-americanphotographs-item']
			},
			{ 
				id:41,
				url: '1_Shannon_1.jpg',
				class: ['print-americanphotographs-item']
			},
			{ 
				id:42,
				url: '2_Shannon_9.jpg',
				class: ['print-americanphotographs-item']
			},
			{ 
				id:43,
				url: '1_Shannon_12.jpg',
				class: ['print-americanphotographs-item']
			}
			,
			{ 
				id:44,
				url: '1_Shannon_15.jpg',
				class: ['print-americanphotographs-item']
			}
			,
			{ 
				id:45,
				url: '3_Shannon_9b.jpg',
				class: ['print-americanphotographs-item']
			}
			,
			{ 
				id:46,
				url: '3_Shannon_5.jpg',
				class: ['print-americanphotographs-item']
			}
			,
			{ 
				id:47,
				url: '4_Shannon_21.jpg',
				class: ['print-americanphotographs-item']
			}
			,
			{ 
				id:48,
				url: '2_Shannon_29.jpg',
				class: ['print-americanphotographs-item']
			}
		
		],
		[],
		[
		// p14
			{ 
				id:49,
				url: 'SB_AGraphicTone_A_IMG_5449_V1_15x15_FInal.jpg',
				class: false
			},
			{ 
				id:50,
				url: 'SE_AGraphicTone_IC_IMG_5464_V1_15x20_Final.jpg',
				class: false
			},
			{ 
				id:51,
				url: 'SE_AGraphicTone_TO_IMG_5479_V1_15x29_Final.jpg',
				class: false
			},
			{ 
				id:52,
				url: 'SE_AGraphicTone_GRAPH_IMG_5473_V1_15x65_Final.jpg',
				class: false
			},
			{ 
				id:53,
				url: 'SE_AGraphicTone_E_IMG_5463_V1_13x15_Final.jpg',
				class: false
			},
			{ 
				id:54,
				url: 'SE_AGraphicTone_N_IMG_5502_V1_15x15_Final.jpg',
				class: false
			}
		],
		[
			{ 
				id:55,
				url: 'SE_AGraphicTone_N_IMG_5502_V1_15x15_Final.jpg',
				class: false
			},
			{ 
				id:56,
				url: 'SE_OnSong_on_VOG_15x18_Final.jpg',
				class: ['twoThirdWidth']
			},
			{ 
				id:57,
				url: 'SE_OnSong_song_G_V3_8x15_Final.jpg',
				class: ['centeredHorizontal']
			}
		],
		[
			{ 
				id:58,
				url: 'SE_Record_IMG_5615_V2_42x50_Final.jpg',
				class: false
			},
			{ 
				id:59,
				url: 'SE_OnSong_on_VOG_15x18_Final.jpg',
				class: false
			},
			{ 
				id:60,
				url: 'SE_OnTrespassing_no_VOG_15x18_Final.jpg',
				class: false
			},
			{ 
				id:61,
				url: 'SE_OnTrespassing_no_VOG_15x18_Final_1.jpg',
				class: false
			},
			{ 
				id:62,
				url: 'SE_OnTrespassing_pass_V2_15x31_Final.jpg',
				class: false
			},
			{ 
				id:63,
				url: 'SE_OnTrespassing_tres_VOG_15x32_Final.jpg',
				class: false
			},
			{ 
				id:64,
				url: 'SE_OnTrespassing_Sing_V3_15x30_Final.jpg',
				class: false
			},
			{ 
				id:65,
				url: 'SE_OnTrespassing_ing_V2_15x22_Final.jpg',
				class: false
			}
		],
		[],
		[
			{ 
				id:66,
				url: 'hot-field-sec-1.jpg',
				class: ['centeredFullPage']
			}
		],
		[
					{ 
				id:67,
				url: 'hot-field-sec-2.jpg',
				class: ['centeredFullPage']
			}
		],
		[
			{ 
				id:68,
				url: 'SE_Section_3_WetWords_V3_118x178.jpg',
				class: ['centeredFullPage']
			}
		]

		

	];

	function format_img_src(letter){
		var this_letter = letter.toUpperCase();
		if(this_letter == '&')
			this_letter = 'ampersand';
		else if(this_letter == '.')
			this_letter = 'period';
		else if(this_letter == ',')
			this_letter = 'comma';
		else if(this_letter == '#')
			this_letter = 'hash';
		else if(this_letter == '/')
			this_letter = 'slash';
		else if(this_letter == ' ')
			return 'whitespace';
		var this_max = filenum_arr[this_letter];
		var letter_order = Math.floor(Math.random() * Math.floor(this_max));
		var output = 'media/letters/'+this_letter+'-'+letter_order+'.jpg';
		return output;
	}

	function addCover(s, r_words, pageTemplate){
		var sheetsParent = s[0].parentNode;

		var cover = pageTemplate.cloneNode(true);
		var blankPage_cloned = pageTemplate.cloneNode(true);
		var backCover = pageTemplate.cloneNode(true);
		
		// add covers and 2 bastard pages at the front
		sheetsParent.insertBefore(blankPage_cloned, s[0]);
		var blankPage_cloned = pageTemplate.cloneNode(true);
		sheetsParent.insertBefore(blankPage_cloned, s[0]);
		sheetsParent.insertBefore(cover, s[0]);

		// calculate how many pages to add to make it multiple of 4
		var sheets_temp = document.getElementsByClassName('📖-print-sheet');
		var confirmed_page_number = sheets_temp.length + 1; // +1 for back cover
		var pagesToAdd = (confirmed_page_number % 4) == 0 ? 0 : 4 - (confirmed_page_number % 4);
		console.log('confirmed_page_number = ' + confirmed_page_number);
		console.log('pagesToAdd = ' + pagesToAdd);
		for (i = 0; i< pagesToAdd; i++)
		{
			var blankPage_cloned = pageTemplate.cloneNode(true);
			sheetsParent.appendChild(blankPage_cloned);
		} 
		
		sheetsParent.appendChild(backCover);

		if (window.XMLHttpRequest) { // Mozilla, Safari, IE7+ ...
		    var httpRequest = new XMLHttpRequest();
		} else if (window.ActiveXObject) { // IE 6 and older
		    var httpRequest = new ActiveXObject("Microsoft.XMLHTTP");
		}
		httpRequest.onreadystatechange = function(){
			if (httpRequest.readyState === XMLHttpRequest.DONE) {
				
		      if (httpRequest.status === 200) {	
	      		var response = JSON.parse(httpRequest.responseText);
	      		
	      		if(response){
	      			current_letter = response['current_pos'];
	      			var wait = 1000 - (Date.now() % 1000);
	      			current_letter++;
	      			if(current_letter >= radio_words.length)
	      				current_letter = 0;
	      			var coverUrl = format_img_src(r_words[current_letter]);
	      			var coverImg = document.createElement('IMG');
	      			cover.appendChild(coverImg);
	      			coverImg.onload = function(){
	      				document.body.classList.add('readyForPrint');
	      			}
	      			coverImg.className = 'print-cover-img';
	      			coverImg.src = coverUrl;
	      		}
		      }
		    }
		};
		httpRequest.open('GET', 'http://stray.o-r-g.net/now');
		httpRequest.send();
		
	}


	window.addEventListener('load', function(){
		Bindery.makeBook({ 
			content: '.print-content',
			view: Bindery.View.PRINT,
			// rules: [
			//     Bindery.PageBreak({ selector: '.page', position: 'before' }),
		 //    ],
			pageSetup: {
				size: { width: '210mm', height: '297mm' },
				margin: { top: '17.5mm', inner: '30mm', outer: '10mm', bottom: '17.5mm' },
			},
			printSetup: {
			    // layout: Bindery.Layout.BOOKLET,
			    // paper: Bindery.Paper.LETTER_PORTRAIT,
			    marks: Bindery.Marks.CROP,
			    bleed: '12pt',
			},
			rules: [
		      Bindery.PageBreak(
		      	{ selector: '.hotfield-break', position: 'after', continue:'left' }
	      	),
		    ], 

		});
		setTimeout(function(){
			var sheets = document.getElementsByClassName('📖-print-sheet');
			console.log(sheets.length);
			
			if(sheets.length == 0)
			{
				console.log('Do something while it somehow doesnt get .sheets');
				setTimeout(function(){
					var sheets = document.getElementsByClassName('📖-print-sheet');
					console.log(sheets.length);
				}, 2000);
			}
			try{
				var sheetsParent = sheets[0].parentNode;
			}
			catch(err)
			{
				var sPrint_mask_p = document.querySelector('#print_mask p');
				sPrint_mask_p.innerText = 'ERROR HAPPENED. PLEASE REFRESH.'
				console.log(err.message);
				return false;
			}
			var cloned_temp_container = document.createElement('DIV');
			var firstSheet = sheetsParent.firstChild;
			var i = 0;
			var image_counter = 1;
			document.body.classList.add('readyForPrint');
			while(firstSheet !== null)
			{
				var cloned = firstSheet.cloneNode(true);
				var clonedText_container = cloned.querySelector('.text-container');
				var isText = false;
				// modify class
				if(clonedText_container !== null){
					clonedText_container.classList.add('mask-text-container');
					clonedText_container.classList.remove('text-container');
					isText = true;
					if(firstSheet.classList.contains('📖-print-sheet-left'))
						changePageClass(firstSheet, 'right');
					else
						changePageClass(cloned, 'left');
				}

				// add image
				if(print_image_arr[i] !== undefined && print_image_arr[i].length > 0)
				{
					print_image_arr[i].forEach(function(el, j){
						var thisUrl = 'media/jpg/'+el.url;
						var thisImg = document.createElement('IMG');
						// if(el.id != 'undefined')
						// if(i == print_image_arr.length - 1 && (print_image_arr[i].length == 0 || j == print_image_arr[i].length - 1))
						// {
						// 	thisImg.onload = function(){
						// 		addCover(sheets, radio_words);
						// 	};
						// }

						thisImg.src = thisUrl;
						thisImg.id = 'print-image-holder-'+image_counter;
						if(el.id != 'undefined')
							thisImg.id = 'print-image-holder-'+el.id;
						thisImg.classList.add('print-image-holder');
						if(el.class)
							el.class.forEach(cls=>thisImg.classList.add(cls));
						cloned.appendChild(thisImg);
						image_counter++;
						
					});

				}
				// append .text-containr and .mask-text-container to cloned_temp_container
				// sheetsParent.insertBefore(firstSheet, cloned) makes the work harder cause it expands the sheets array and messes foreach().
				if(isText)
					cloned_temp_container.appendChild(cloned);
				cloned_temp_container.appendChild(firstSheet);
				firstSheet = sheetsParent.firstChild;
				i++;
			}
			while(cloned_temp_container.firstChild != null)
				sheetsParent.appendChild(cloned_temp_container.firstChild);

			// create blankPage as a template for inserting cover, appendix, etc
			var blankPage = sheets[0].cloneNode(true);
			var contentOfBlankPage = blankPage.querySelector('.region-content');
			contentOfBlankPage.innerHTML = '';
			var imgOfBlankPage = blankPage.querySelectorAll('img');
			while(imgOfBlankPage.length != 0){
				blankPage.removeChild(imgOfBlankPage[0]);
				imgOfBlankPage = blankPage.querySelectorAll('img');
			}

			// add cover
			addCover(sheets, radio_words, blankPage);

			// add appendix
			

			// addCover(sheets, radio_words);


		}, 4000);

		function changePageClass(el, positionWanted)
		{
			var classToAdd = '📖-print-sheet-' + positionWanted;
			if(!el.classList.contains(classToAdd))
			{
				var positionUnwanted = el.classList.contains('📖-print-sheet-right') ? 'right' : 'left';
				var classToRemove = '📖-print-sheet-'+positionUnwanted;
				el.classList.remove(classToRemove);
				el.classList.add(classToAdd);
				var pageToChange = el.querySelector('.📖-page');
				pageToChange.classList.remove('📖-'+positionUnwanted);
				pageToChange.classList.add('📖-'+positionWanted);
				return true;
			}
			else
				return false;
		}
	});
	
</script>