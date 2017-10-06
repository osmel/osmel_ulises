
<div id="parentHorizontalTab">
      <ul class="resp-tabs-list hor_1">
          <li>Pre-construcción</li>
          <li>Diseño y construcción</li>
          <li>Post-construcción</li>
      </ul>
      <div class="resp-tabs-container hor_1">
          <div>
              <p>
                 Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum nibh urna, euismod ut ornare non, volutpat vel tortor. Integer laoreet placerat suscipit. Sed sodales scelerisque commodo. Nam porta cursus lectus. Proin nunc erat, gravida a facilisis quis, ornare id lectus. Proin consectetur nibh quis urna gravida mollis.
              </p>
              <p>Tab 1 Container</p>
          </div>
          <div>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum nibh urna, euismod ut ornare non, volutpat vel tortor. Integer laoreet placerat suscipit. Sed sodales scelerisque commodo. Nam porta cursus lectus. Proin nunc erat, gravida a facilisis quis, ornare id lectus. Proin consectetur nibh quis urna gravida mollis.</p>
              
              <p>Tab 2 Container</p>
          </div>
          <div>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum nibh urna, euismod ut ornare non, volutpat vel tortor. Integer laoreet placerat suscipit. Sed sodales scelerisque commodo. Nam porta cursus lectus. Proin nunc erat, gravida a facilisis quis, ornare id lectus. Proin consectetur nibh quis urna gravida mollis.</p>
              
              <p>Tab 3 Container</p>
          </div>
      </div>
</div>


<script type="text/javascript">
	$(document).ready(function() {
		$('#parentHorizontalTab').easyResponsiveTabs({
            type: 'default', //Types: default, vertical, accordion
            width: 'auto', //auto or any width like 600px
            fit: true, // 100% fit in a container
            tabidentify: 'hor_1', // The tab groups identifier
            
        });
	});
</script>