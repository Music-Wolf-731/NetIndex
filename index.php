<?php
$ParticleNum = 300;
function CreateParticle()
{
    $Num = $GLOBALS['ParticleNum'];
    for ($i = 0; $i < $Num; $i++) {
        echo '<div id="Particle_' . $i . '"></div>';
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HarLer</title>
    <link rel="stylesheet" href="index.css">


</head>

<body>
    <header>
        <a href="HarLerArt">
            <h1>HARLER</h1>
        </a>
    </header>
    <header class="header">
        <a href="HarLerArt">
            <h1>HARLER</h1>
        </a>
    </header>
    <div class="character">
        <img src="https://wolf-test-box.s3.ap-northeast-1.amazonaws.com/HarlerArt/floating.gif" alt="Character">
    </div>
    <div class="ripples">
        <div class="ripple"></div>
        <div class="ripple"></div>
        <div class="ripple"></div>
        <div class="ripple"></div>
    </div>
    <div class="particles">
    </div>
    <div id="container" class="particles"><?php CreateParticle() ?></div>
</body>
<script>
    const container = document.getElementById('container');
    const n = 1; // 每秒生成的div數量

    function MoveDot() {
        let ParticleNum = <?php echo $ParticleNum; ?>;
        for (let i = 0; i < ParticleNum; i++) {
            let top = Math.random();
            let left = Math.random();
            setTimeout(() => {
                let DotDiv = document.getElementById('Particle_' + i)
                console.log('Particle_' + i);
                DotDiv.classList.remove('S', 'M', 'L', 'XL');
                if (top < 0.25) {
                    DotDiv.classList.add('S');
                } else if (top >= 0.25 && top < 0.5) {
                    DotDiv.classList.add('M');
                } else if (top >= 0.5 && top < 0.75) {
                    DotDiv.classList.add('L');
                } else if (top >= 0.75 && top <= 1) {
                    DotDiv.classList.add('XL');
                }

                DotDiv.classList.add('child');
                DotDiv.style.left = `${left * (container.clientWidth)}px`;
                DotDiv.style.top = `${top * (container.clientHeight - 50)}px`;
            }, 5000 / ParticleNum * i);
        }
    }
    MoveDot()
    setInterval(MoveDot, 5000);
    // function createDiv() {
    //     for (let i = 0; i < n; i++) {
    //         const div = document.createElement('div');
    //         div.className = 'child';
    //         let top = Math.random();
    //         let left = Math.random();
    //         let width = Math.floor(top * 2) + 2;
    //         div.style.left = `${left * (container.clientWidth)}px`;
    //         div.style.top = `${top * (container.clientHeight - 50)}px`;
    //         div.style.zIndex = `${Math.floor(top * 10)}`;
    //         div.style.width = `${width}vw`;
    //         div.style.height = `${width}vw`;
    //         div.style.filter = `brightness(${(.8-Math.abs(left-.5)) * 150 + (Math.random() * 30 - 15)}%)`;

    //         container.appendChild(div);

    //         console.log(top)
    //         setTimeout(() => {
    //             container.removeChild(div);
    //         }, 5000);
    //     }
    // }

    // setInterval(createDiv, 50);
</script>

</html>