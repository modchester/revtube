<script>

function goToVid() {
    document.location.href = `?v=` + document.querySelector('#playUrl').value;
    return false;
}

</script>

<h1>patched 2013 youtube video player</h1>
<p>enter a video URL below. file:// urls aren't supported, and data: urls lag and crash the player.</p>
<form onsubmit="return goToVid();"><input type="tel" id="playUrl" placeholder="enter URL" size="40" required> <input type="submit" id="playBtn" value="play video"></input></form>
<p>switch to <a href="https://2016.byteemail.com">2016</a></p>