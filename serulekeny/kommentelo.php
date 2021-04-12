<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
		<meta name="Máté András" content="Fiktív webshop weboldal">
		<link rel="icon" href="favicon.png" type="image/x-icon">
  <link rel="stylesheet" href="styleK.css">
  <script src="https://examples.insecure.chefsecure.com/assets/insecure/examples_init-68be104777c4cf393aa9f839ea13e584a2f44c9317cbf333c7aa239221316ccf.js"></script>
</head>
<body>
  
  <div class="row">
  <img src="shop.png" alt="logo" width="150px">
  </div>

  <div class="styled-input">
      <?php
if(isset($_REQUEST['req']))
{
	print "Üdv " . $_REQUEST['req'] . "! Oszdd meg velünk véleményed! "; 
}
?>
  <input id="input" type="text" rows="50" required>
  <label></label>
  <span></span>
</div>
<div class="btn-wrap">
  <button id="update">Küldés</button>
</div>
<h4 class="title">Vásárlói vélemények</h4>
<hr>
<p><span id="value"></span></p>

<script>
  /* Szerverválasz imitálása az innerHTML miatt 
  Forrás: https://stackoverflow.com/a/20584396 */
  function nodeScriptReplace(node) {
    if ( nodeScriptIs(node) === true ) {
      node.parentNode.replaceChild( nodeScriptClone(node) , node );
    }
    else {
      var i = 0;
      var children = node.childNodes;
      while ( i < children.length ) {
        nodeScriptReplace( children[i++] );
      }
    }

    return node;
  }
  function nodeScriptIs(node) {
    return node.tagName === 'SCRIPT';
  }
  function nodeScriptClone(node){
    var script  = document.createElement("script");
    script.text = node.innerHTML;
    for( var i = node.attributes.length-1; i >= 0; i-- ) {
      script.setAttribute( node.attributes[i].name, node.attributes[i].value );
    }
    return script;
  }
  function inputUpdated() {
    let value = document.getElementById('value')

    value.innerHTML = document.getElementById('input').value
    nodeScriptReplace(value)
    sendHeight()
  }

  document.getElementById('update').addEventListener('click', inputUpdated)
</script>

</body>
</html>