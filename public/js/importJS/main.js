function Jloading() {
    $("body").css("overflow", "hidden");
    $("body").css("position", "fixed");
    var loadHtml = `
    <div id="loading_cover">
        <div id="particles-background" class="vertical-centered-box"></div>
        <div id="particles-foreground" class="vertical-centered-box"></div>

        <div class="vertical-centered-box">
            <div class="content">
                <div class="loader-circle"></div>
                <div class="loader-line-mask">
                    <div class="loader-line"></div>
                </div>


                <svg width="70" height="70" xmlns="http://www.w3.org/2000/svg">
                <!-- Created with Method Draw - http://github.com/duopixel/Method-Draw/ -->
                <g>
                <title>background</title>
                <rect fill="none" id="canvas_background" height="72" width="72" y="-1" x="-1"/>
                <g display="none" overflow="visible" y="0" x="0" height="100%" width="100%" id="canvasGrid">
                <rect fill="url(#gridpattern)" stroke-width="0" y="0" x="0" height="100%" width="100%"/>
                </g>
                </g>
                <g>
                <title>Layer 1</title>
                <text stroke="#000" transform="matrix(5.9017775179982035,0,0,9.087327533580154,-456.97667975767797,-1184.7283209594514) " xml:space="preserve" text-anchor="start" font-family="Helvetica, Arial, sans-serif" font-size="24" id="svg_1" y="159.955891" x="102.55858" stroke-width="0" fill="#ffffff">Ming</text>
                <text stroke="#000" transform="matrix(0.9787946296506093,0,0,0.8863232731819153,4.960887812612563,2.8898755395784974) " xml:space="preserve" text-anchor="start" font-family="Helvetica, Arial, sans-serif" font-size="30" id="svg_2" y="30.256459" x="0.507952" stroke-width="0" fill="#ffffff">Ming</text>
                <text stroke="#000" transform="matrix(0.9003566111232431,0,0,0.9806218471239632,-0.45894428335486737,-3.5374227498951694) " xml:space="preserve" text-anchor="start" font-family="Helvetica, Arial, sans-serif" font-size="15" id="svg_3" y="60.526759" x="7.409585" stroke-width="0" fill="#ffffff">Loading...</text>
                </g>
            </svg>
            </div>
        </div>
    </div>
    `;
    $("body").append(loadHtml);
}

function removeJLoading() {
    $("body").css("overflow", "");
    $("body").css("position", "");
    $("#loading_cover").remove();
}