<?php 
defined( 'ABSPATH' ) or die ( 'I\'m a plugin! Please don\'t access me directly!' );


wp_enqueue_style( 'artise-tile-simulator-shared-style', plugins_url( 'artise-simulator/assets/css/tile-simulator-shared.css' ) );
wp_enqueue_style( 'artise-tile-simulator-2d-style', plugins_url( 'artise-simulator/assets/css/tile-simulator-2d.css' ) );


wp_enqueue_script( 'three-js', plugins_url( 'artise-simulator/assets/js/three.min.js' ), array( 'jquery' ) );

wp_enqueue_script( 'artise-tile-simulator-2d-script', plugins_url( 'artise-simulator/assets/js/tile-simulator-2d.js' ), array( 'jquery', 'three-js' ) );





?>


<div id="simulator-2d-container" class="simulator-container" data-tile-shape="square">

	<img id="simulator-logo" style="display: none" src="<?php echo plugins_url( 'artise-simulator/assets/images/misc/logo.png' ) ?>">

	<?php require_once( 'tile-simulator-controller.php' ); ?>


	<div id="view-environments-container">
		<h1 class="simulator-section-title">View</h1>

		<div id="environments" class="tile-view">

			<!-- Buttons -->
			<span id="close-env-button" class="dashicons dashicons-no env-button"></span>

			<span id="expand-env-button" class="dashicons dashicons-editor-expand env-button"></span>
			

			<!-- TILED -->
			<div id="tiled-simulator" class="env-container active" data-env="tiled">

				<div id="tiled-image-container" class="env-image-container"></div>

				<div id="tiled-wall-container" class="wall wall-container bg-container selected">
					<div class="border-background" data-bg-part="top"></div>
					<div class="border-background" data-bg-part="bottom"></div>
					<div class="border-background" data-bg-part="left"></div>
					<div class="border-background" data-bg-part="right"></div>

					<div class="border-background corner" data-bg-part="corner-tl"></div>
					<div class="border-background corner" data-bg-part="corner-tr"></div>
					<div class="border-background corner" data-bg-part="corner-bl"></div>
					<div class="border-background corner" data-bg-part="corner-br"></div>


					<div class="background"></div>
				</div>
				
			</div>

			<!-- BEDROOM -->


			<!-- BEDROOM -->
			<div id="bedroom-simulator" class="env-container" data-env="bedroom">
				<!-- Hovers -->
				<div id="bedroom-floor-hover" class="floor floor-hover hover" data-part="floor"></div>

				<!-- Image -->
				<div class="env-image-container" class="container">
					<img src="<?php echo plugins_url( 'artise-simulator/assets/images/env/bedroom_old2.png' ) ?>">
				</div>

				<!-- Parts -->

				<!-- <div id="bedroom-floor-container" class="floor floor-container bg-container">
					<div class="background"></div>
				</div>
 -->

				<!-- NEW BEDROOM -->
				<canvas id="bedroom-floor-container-1" class="floor-container bg-container three-bg-container small" 
					data-part="floor-small" 
					data-xRepeat="40" data-yRepeat="15"
					data-width="500" data-height="150"
					data-position="-2,-40,-1.5" 
					data-rotation="-1.61,0,0" 
					data-zcamera="70" 
					data-borders="bedroom-border-1,bedroom-border-2"
				></canvas>

				<div id="bedroom-border-1" data-xtiles="40" data-position="0,5,0.1" data-border-part="top"></div>

				<div id="bedroom-border-2" data-ytiles="15" data-position="-7,0,0.1" data-border-part="left"></div>

				<!-- 12x12 -->
				<canvas id="bedroom-floor-container-2" class="floor-container bg-container three-bg-container big" 
					data-part="floor-big" 
					data-xRepeat="25" data-yRepeat="12" 
					data-width="500" data-height="150" 
					data-position="8,-40,0"
					data-rotation="-1.61,0,0"
					data-zcamera="70" 
					data-borders="bedroom-border-3,bedroom-border-4"
				></canvas>

				<div id="bedroom-border-3" data-xtiles="25" data-position="0,4,0.1" data-border-part="top"></div>

				<div id="bedroom-border-4" data-ytiles="12" data-position="-5,0,0.1" data-border-part="left"></div>

			</div>

			<!-- LIVING ROOM -->
			<div id="living-room-simulator" class="env-container" data-env="living-room">
				<!-- Hovers -->
				<div id="living-room-wall-hover1" class="wall wall-hover hover" data-part="wall"></div>

				<!-- Image -->
				<div class="env-image-container" class="container">
					<img src="<?php echo plugins_url( 'artise-simulator/assets/images/env/living_room.png' ) ?>">
				</div>

				<!-- Parts -->
				<!-- <div id="living-room-wall-container1" class="wall wall-container bg-container">
					<div class="background"></div>
				</div> -->

				<canvas id="living-room-wall-container-1" class="wall-container bg-container three-bg-container small"
					data-part="wall-small"
					data-xRepeat="20" data-yRepeat="10" 
					data-width="500" data-height="390" 
					data-position="0,10,-3.5"
					data-zcamera="70" 
					data-borders="living-room-border-1,living-room-border-2,living-room-border-3,living-room-border-4,living-room-border-5,living-room-border-6,living-room-border-7,living-room-border-8"
				></canvas>

				<div id="living-room-border-1" data-xtiles="25" data-position="0,-4,0.1" data-border-part="bottom"></div>
				<div id="living-room-border-2" data-xtiles="25" data-position="0,4,0.1" data-border-part="top"></div>
				<div id="living-room-border-3" data-ytiles="25" data-position="-6,0,0.1" data-border-part="left"></div>
				<div id="living-room-border-4" data-ytiles="25" data-position="7,0,0.1" data-border-part="right"></div>

				<div id="living-room-border-5" data-position="-6,4,0.1" data-border-part="corner-tl"></div>
				<div id="living-room-border-6" data-position="7,4,0.1" data-border-part="corner-tr"></div>
				<div id="living-room-border-7" data-position="-6,-4,0.1" data-border-part="corner-bl"></div>
				<div id="living-room-border-8" data-position="7,-4,0.1" data-border-part="corner-br"></div>





				<!-- 12 x 12 -->
				<canvas id="living-room-wall-container-2" class="wall-container bg-container three-bg-container big"
					data-part="wall-big"
					data-xRepeat="20" data-yRepeat="10" 
					data-width="600" data-height="450" 
					data-position="0,0,-3"
					data-zcamera="70" 
					data-borders="living-room-border-9,living-room-border-10,living-room-border-11,living-room-border-12,living-room-border-13,living-room-border-14,living-room-border-15,living-room-border-16"
				></canvas>

				<div id="living-room-border-9" data-xtiles="20" data-position="0.5,-3,0.1" data-border-part="bottom"></div>
				<div id="living-room-border-10" data-xtiles="25" data-position="0,4,0.1" data-border-part="top"></div>
				<div id="living-room-border-11" data-ytiles="25" data-position="-5,0,0.1" data-border-part="left"></div>
				<div id="living-room-border-12" data-ytiles="25" data-position="6,0,0.1" data-border-part="right"></div>

				<div id="living-room-border-13" data-position="-5,4,0.1" data-border-part="corner-tl"></div>
				<div id="living-room-border-14" data-position="6,4,0.1" data-border-part="corner-tr"></div>
				<div id="living-room-border-15" data-position="-5,-3,0.1" data-border-part="corner-bl"></div>
				<div id="living-room-border-16" data-position="6,-3,0.1" data-border-part="corner-br"></div>


				

			</div>

			<!-- KITCHEN -->
			<div id="kitchen-simulator" class="env-container" data-env="kitchen">
				<!-- Hovers -->
				<div id="kitchen-wall-hover" class="wall wall-hover hover" data-part="wall"></div>
				<div id="kitchen-floor-hover" class="floor floor-hover hover" data-part="floor"></div>


				<!-- Image -->
				<div class="env-image-container" class="container">
					<img src="<?php echo plugins_url( 'artise-simulator/assets/images/env/kitchen.png' ) ?>">
				</div>

				<!-- Parts -->
				<!-- <div id="kitchen-wall-container-1" class="wall wall-container bg-container">
					<div class="background"></div>
				</div> -->

				<canvas id="kitchen-wall-container-1" class="wall-container bg-container three-bg-container small" 
					data-part="wall-small" 
					data-xRepeat="33" data-yRepeat="15" 
					data-width="250" data-height="200" 
					data-position="0.7, 1.2, 17"
					data-zcamera="70"
					data-borders="kitchen-wall-border-1, kitchen-wall-border-2"
					>	
				</canvas>

				<div id="kitchen-wall-border-1" data-xtiles="33" data-position="0,0,0.1" data-border-part="bottom"></div>

				<div id="kitchen-wall-border-2" data-xtiles="33" data-position="0,2,0.1" data-border-part="top"></div>


				<canvas id="kitchen-wall-container-2" class="wall-container bg-container three-bg-container big" 
					data-part="wall-big" 
					data-xRepeat="33" data-yRepeat="15" 
					data-width="250" data-height="200" 
					data-position="0.7,-0.4,37"
					data-zcamera="70"
					data-borders="kitchen-wall-border-1, kitchen-wall-border-2"
					>	
				</canvas>



				<!-- <div id="kitchen-floor-container" class="floor floor-container bg-container">
					<div class="background"></div>
				</div>

				 -->


				<canvas id="kitchen-floor-container-1" class="floor-container bg-container three-bg-container small" 
					data-part="floor-small" 
					data-xRepeat="33" data-yRepeat="15" 
					data-width="250" data-height="100" 
					data-position="0, -40, 0.2"
					data-rotation="-1.8, 0, 0"
					data-zcamera="70"
					data-borders="kitchen-floor-border-1, kitchen-floor-border-2, kitchen-floor-border-3, kitchen-floor-border-4, kitchen-floor-border-9, kitchen-floor-border-10">	
				</canvas>

				<div id="kitchen-floor-border-1" data-xtiles="8" data-position="0.5,-8,0.1" data-border-part="bottom"></div>

				<div id="kitchen-floor-border-2" data-ytiles="5" data-position="-4,-5,0.1" data-border-part="left"></div>

				<div id="kitchen-floor-border-3" data-ytiles="5" data-position="5,-5,0.1" data-border-part="right"></div>

				<div id="kitchen-floor-border-4" data-xtiles="33" data-position="1,-13,0.1" data-border-part="top"></div>

				<div id="kitchen-floor-border-9" data-position="-4,-8,0.1" data-border-part="corner-bl"></div>

				<div id="kitchen-floor-border-10" data-position="5,-8,0.1" data-border-part="corner-br"></div>




				


				<!-- 12x12 -->
				<canvas id="kitchen-floor-container-2" class="floor-container bg-container three-bg-container big" 
					data-part="floor-big" 
					data-xRepeat="18" data-yRepeat="10" 
					data-width="250" data-height="100" 
					data-position="0, -40, 1"
					data-rotation="-1.8, 0, 0"
					data-zcamera="70"
					data-borders="kitchen-floor-border-1, kitchen-floor-border-5, kitchen-floor-border-6, kitchen-floor-border-7, kitchen-floor-border-8, kitchen-floor-border-11, kitchen-floor-border-12"
				></canvas>

				<div id="kitchen-floor-border-5" data-xtiles="4" data-position="0.5,-5,0.1" data-border-part="bottom"></div>
				<div id="kitchen-floor-border-6" data-ytiles="6" data-position="-2,-2.5,0.1" data-border-part="left"></div>
				<div id="kitchen-floor-border-7" data-ytiles="6" data-position="3,-2.5,0.1" data-border-part="right"></div>
				<div id="kitchen-floor-border-8" data-xtiles="9" data-position="0,-8,0.1" data-border-part="bottom"></div>

				<div id="kitchen-floor-border-11" data-position="-2,-5,0.15" data-border-part="corner-bl"></div>

				<div id="kitchen-floor-border-12" data-position="3,-5,0.15" data-border-part="corner-br"></div>



			</div>


			<!-- BATHROOM -->
			<div id="bathroom-simulator" class="env-container" data-env="bathroom">
				<!-- Hovers -->
				<div id="bathroom-wall-hover1" class="wall wall-hover hover" data-part="wall"></div>
				<div id="bathroom-floor-hover" class="floor floor-hover hover" data-part="floor"></div>

				<!-- Image -->
				<div class="env-image-container" class="container">
					<img src="<?php echo plugins_url( 'artise-simulator/assets/images/env/bathroom.png' ) ?>">
				</div>

				<!-- Parts -->
				<!-- <div id="bathroom-wall-container-1" class="wall wall-container bg-container">
					<div class="background"></div>
				</div> -->

				<canvas id="bathroom-wall-container-1" class="wall-container bg-container three-bg-container small" 
					data-part="wall-small" 
					data-xRepeat="20" data-yRepeat="10" 
					data-width="260" data-height="175"
					data-position="4.3,3,10"
					data-zcamera="70",
					data-borders="bathroom-wall-border-1, bathroom-wall-border-2, bathroom-wall-border-3, bathroom-wall-border-4, bathroom-wall-border-5, bathroom-wall-border-6, bathroom-wall-border-7, bathroom-wall-border-8"
				></canvas>

				<div id="bathroom-wall-border-1" data-xtiles="40" data-position="0.5,6,0.1" data-border-part="top"></div>

				<div id="bathroom-wall-border-2" data-xtiles="20" data-position="0.5,0,0.1" data-border-part="bottom"></div>

				<div id="bathroom-wall-border-3" data-ytiles="20" data-position="-5,0.5,0.1" data-border-part="left"></div>

				<div id="bathroom-wall-border-4" data-ytiles="20" data-position="-1,.5,0.1" data-border-part="right"></div>

				<div id="bathroom-wall-border-5" data-position="-5,6,0.1" data-border-part="corner-tl"></div>

				<div id="bathroom-wall-border-6" data-position="-1,6,0.1" data-border-part="corner-tr"></div>

				<div id="bathroom-wall-border-7" data-position="-5,0,0.15" data-border-part="corner-bl"></div>

				<div id="bathroom-wall-border-8" data-position="-1,0,0.15" data-border-part="corner-br"></div>


				<!-- 12x12 -->
				<canvas id="bathroom-wall-container-2" class="wall-container bg-container three-bg-container big" 
					data-part="wall-big" 
					data-xRepeat="20" data-yRepeat="10" 
					data-width="260" data-height="175"
					data-position="4.7,2.4,22"
					data-zcamera="70",
					data-borders="bathroom-wall-border-9, bathroom-wall-border-2, bathroom-wall-border-10, bathroom-wall-border-4, bathroom-wall-border-11, bathroom-wall-border-12, bathroom-wall-border-13, bathroom-wall-border-8"
				></canvas>

				<div id="bathroom-wall-border-9" data-xtiles="40" data-position="0.5,5,0.1" data-border-part="top"></div>

				<div id="bathroom-wall-border-10" data-ytiles="20" data-position="-4,0.5,0.1" data-border-part="left"></div>

				<div id="bathroom-wall-border-11" data-position="-4,5,0.1" data-border-part="corner-tl"></div>

				<div id="bathroom-wall-border-12" data-position="-1,5,0.1" data-border-part="corner-tr"></div>

				<div id="bathroom-wall-border-13" data-position="-4,0,0.1" data-border-part="corner-bl"></div>






				<!-- <div id="bathroom-floor-container" class="floor floor-container bg-container">
					<div class="background"></div>
				</div> -->

				<canvas id="bathroom-floor-container-1" class="floor-container bg-container three-bg-container small" 
					data-part="floor-small" 
					data-xRepeat="20" data-yRepeat="10" 
					data-width="260" data-height="100"
					data-position="2.5, -42, 2" 
					data-rotation="-1.6, 0, 0,"
					data-zcamera="70"
					data-borders="bathroom-floor-border-1, bathroom-floor-border-2, bathroom-floor-border-3, bathroom-floor-border-4"
				></canvas>
				<div id="bathroom-floor-border-1" data-xtiles="20" data-position="0,-6,0.1" data-border-part="bottom"></div>
				<div id="bathroom-floor-border-2" data-xtiles="20" data-position="1,0,0.1" data-border-part="top"></div>

				<div id="bathroom-floor-border-3" data-ytiles="10" data-position="-7,-2,0.1" data-border-part="left"></div>

				<div id="bathroom-floor-border-4" data-ytiles="10" data-position="11,-2,0.1" data-border-part="right"></div>



				<!-- 12x12 -->
				<canvas id="bathroom-floor-container-2" class="floor-container bg-container three-bg-container big" 
					data-part="floor-big" 
					data-xRepeat="15" data-yRepeat="9" 
					data-width="260" data-height="100"
					data-position="3, -41, 3.5"
					data-rotation="-1.6, 0, 0"
					data-zcamera="70"
					data-borders="bathroom-floor-border-2, bathroom-floor-border-5, bathroom-floor-border-6, bathroom-floor-border-7"

				></canvas>

				<div id="bathroom-floor-border-5" data-xtiles="20" data-position="0,-5,0.1" data-border-part="top"></div>

				<div id="bathroom-floor-border-6" data-ytiles="10" data-position="-5,-2,0.1" data-border-part="left"></div>

				<div id="bathroom-floor-border-7" data-ytiles="10" data-position="8,-2,0.1" data-border-part="right"></div>
			</div>




			<!-- COMMERCIAL -->
			<div id="commercial-simulator" class="env-container" data-env="commercial">
				<!-- Hovers -->
				<div id="commercial-wall-hover1" class="wall wall-hover hover" data-part="wall"></div>
				<div id="commercial-floor-hover" class="floor floor-hover hover" data-part="floor"></div>

				<!-- Image -->
				<div class="env-image-container" class="container">
					<img src="<?php echo plugins_url( 'artise-simulator/assets/images/env/commercial_old.png' ) ?>">
				</div>

				<!-- Parts -->
				<!-- <div id="commercial-wall-container-1" class="wall wall-container bg-container">
					<div class="background"></div>
				</div> -->

				<canvas id="commercial-wall-container-1" class="wall-container bg-container three-bg-container small" 
					data-part="wall-small" 
					data-xRepeat="28" data-yRepeat="8" 
					data-width="300" data-height="100" 
					data-position="3,1.5,-0.5"
					data-zcamera="70"
					data-borders="commercial-wall-border-1, commercial-wall-border-2, commercial-wall-border-3, commercial-wall-border-5, commercial-wall-border-6"
				></canvas>

				<div id="commercial-wall-border-1" data-xtiles="23" data-position="-6,8,0.1" data-border-part="top"></div>

				<div id="commercial-wall-border-2" data-ytiles="23" data-position="-8,1,0.1" data-border-part="right"></div>

				<div id="commercial-wall-border-3" data-xtiles="23" data-position="-6,-1,0.1" data-border-part="bottom"></div>


				<div id="commercial-wall-border-5" data-position="-8,8,0.1" data-border-part="corner-tr"></div>

				<div id="commercial-wall-border-6" data-position="-8,-1,0.1" data-border-part="corner-br"></div>






				<!-- 12x12 -->
				<canvas id="commercial-wall-container-2" class="wall-container bg-container three-bg-container big" 
					data-part="wall-big" 
					data-xRepeat="28" data-yRepeat="8" 
					data-width="300" data-height="100" 
					data-position="10.8,4,13"
					data-zcamera="70"
					data-borders="commercial-wall-border-4, commercial-wall-border-2, commercial-wall-border-3, commercial-wall-border-6, commercial-wall-border-7"
				></canvas>

				<div id="commercial-wall-border-4" data-xtiles="23" data-position="-6,6,0.1" data-border-part="top"></div>


				<div id="commercial-wall-border-7" data-position="-8,6,0.1" data-border-part="corner-tr"></div>
				

				<!-- <div id="commercial-floor-container" class="floor floor-container bg-container">
					<div class="background"></div>
				</div>
 -->
				<canvas id="commercial-floor-container-1" class="floor-container bg-container three-bg-container small" 
					data-part="floor-small" 
					data-xRepeat="23" data-yRepeat="15" 
					data-width="300" data-height="100" 
					data-position="-10, -40, -0.5"
					data-rotation="-1.44, 0, 0"
					data-zcamera="70"
					data-borders="commercial-floor-border-1, commercial-floor-border-2, commercial-floor-border-3, commercial-floor-border-6, commercial-floor-border-8"
				></canvas>

				<div id="commercial-floor-border-1" data-xtiles="23" data-position="0,1,0.1" data-border-part="top"></div>
				<div id="commercial-floor-border-2" data-ytiles="10" data-position="7,-3.5,0.1" data-border-part="left"></div>
				<div id="commercial-floor-border-3" data-xtiles="3" data-position="9,-9,0.1" data-border-part="bottom"></div>

				<div id="commercial-floor-border-6" data-position="7,-9,0.2" data-border-part="corner-bl"></div>

				<div id="commercial-floor-border-8" data-position="7,1,0.2" data-border-part="corner-tr"></div>


				<!-- 12x12 -->
				<canvas id="commercial-floor-container-2" class="floor-container bg-container three-bg-container big" 
					data-part="floor-big" 
					data-xRepeat="18" data-yRepeat="10" 
					data-width="300" data-height="100" 
					data-position="-4,-42,3"
					data-rotation="-1.45,0,0"
					data-zcamera="70"
					data-borders="commercial-floor-border-10, commercial-floor-border-4, commercial-floor-border-5, commercial-floor-border-7, commercial-floor-border-9"
				></canvas>

				<div id="commercial-floor-border-10" data-xtiles="23" data-position="0,2,0.1" data-border-part="top"></div>

				<div id="commercial-floor-border-4" data-ytiles="6" data-position="5,-1.5,0.1" data-border-part="left"></div>
				<div id="commercial-floor-border-5" data-xtiles="3" data-position="7,-5,0.2" data-border-part="bottom"></div>

				<div id="commercial-floor-border-7" data-position="5,-5,0.2" data-border-part="corner-bl"></div>

				<div id="commercial-floor-border-9" data-position="5,2,0.2" data-border-part="corner-tr"></div>



			</div>


		</div> <!-- End of .environments  -->


		<br>
		<br>
		<br>
		<span>Choose Environment:</span>		
		<div id="env-icons-container">
			<!-- Bedroom Icon -->
			<div id="bedroom-env-button" class="env-icons-image-container" data-env="bedroom">
				<img src="<?php echo plugins_url( 'artise-simulator/assets/images/icons/env_bedroom_icon.png' ) ?>">
				<img class="hover" src="<?php echo plugins_url( 'artise-simulator/assets/images/icons/env_bedroom_hover_icon.png' ) ?>">
			</div>

			<!-- Living room icon -->
			<div id="living-room-env-button" class="env-icons-image-container" data-env="living-room">
				<img src="<?php echo plugins_url( 'artise-simulator/assets/images/icons/env_living_room_icon.png' ) ?>">
				<img class="hover" src="<?php echo plugins_url( 'artise-simulator/assets/images/icons/env_living_room_hover_icon.png' ) ?>">
			</div>

			<!-- Kitchen Icon -->
			<div id="kitchen-env-button" class="env-icons-image-container" data-env="kitchen">
				<img src="<?php echo plugins_url( 'artise-simulator/assets/images/icons/env_kitchen_icon.png' ) ?>">
				<img class="hover" src="<?php echo plugins_url( 'artise-simulator/assets/images/icons/env_kitchen_hover_icon.png' ) ?>">
			</div>

			<!-- Bathroom Icon -->
			<div id="bathroom-env-button" class="env-icons-image-container" data-env="bathroom">
				<img src="<?php echo plugins_url( 'artise-simulator/assets/images/icons/env_bathroom_icon.png' ) ?>">
				<img class="hover" src="<?php echo plugins_url( 'artise-simulator/assets/images/icons/env_bathroom_hover_icon.png' ) ?>">
			</div>

			<!-- Commercial Room Icon -->
			<div id="commercial-env-button" class="env-icons-image-container" data-env="commercial">
				<img src="<?php echo plugins_url( 'artise-simulator/assets/images/icons/env_commercial_room_icon.png' ) ?>">
				<img class="hover" src="<?php echo plugins_url( 'artise-simulator/assets/images/icons/env_commercial_room_hover_icon.png' ) ?>">
			</div>			
		</div> <!-- End of #env-icons-container -->

		<br><br><br>
		<!-- <button id="undo-button" class="artise-button">Undo</button>
		<button id="redo-button" class="artise-button">Redo</button> -->

		<div id="grout-container" class="tile-canvas-bottom">
			<div id="grout-color-container">
				<span>Grout Color:</span>
				<div id="grout-colors">
					<div class="grout-color-box selected" data-color="#ffffff" style="background: #ffffff"></div>
					<div class="grout-color-box" data-color="#b1b2ad" style="background: #b1b2ad"></div>
					<div class="grout-color-box" data-color="#000000" style="background: #000000"></div>
				</div>
			</div>


			<div id="grout-thickness-container">
				<span>Grout Thickness:</span>
				<div id="grout-thickness">
					<div class="artise-button" data-thickness="0.5">None</div>
					<div class="artise-button selected" data-thickness="2">Thin</div>
					<div class="artise-button" data-thickness="6">Thick</div>
					
				</div>
			</div>
			<br>
			
		</div>
		

		<br><br>


		<button id="save-button" class="artise-button">Save</button>


	</div> <!-- End of #view-environments-container -->




</div> <!-- End of #simulator-2d-container -->

<br><br><br><br>