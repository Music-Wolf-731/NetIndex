<?php
$ParticleNum = 60;
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
    let DotTimeOut;

    function MoveDot() {
        clearTimeout(DotTimeOut);
        let ParticleNum = <?php echo $ParticleNum; ?>;
        for (let i = 0; i < ParticleNum; i++) {
            let top = Math.random();
            let leftPot;
            let left = Math.random();
            let halfParticle = ParticleNum / 2
            let DivRun = document.getElementById('Particle_' + i)
            DivRun.className = '';
            DotTimeOut = setTimeout(() => {
                let DotDiv = DivRun


                if (i > halfParticle) {
                    leftPot = i - halfParticle;
                } else {
                    leftPot = i;
                }


                let radian = 10;
                let A = halfParticle / 2 - Math.abs(leftPot - halfParticle / 2);
                A = (A === 0) ? 1 : A;


                DotDiv.classList.remove('S', 'M', 'L', 'XL');
                if (i % 2 == 1) {
                    DotDiv.style.top = `calc(${container.clientHeight - (container.clientHeight/4 * (1 / A)  )}px - 8vh)`;
                    if (leftPot <= halfParticle / 4 || leftPot >= halfParticle / 4 * 3) {
                        DotDiv.classList.add('L');
                    } else if (leftPot > halfParticle / 4 && leftPot < halfParticle / 4 * 3) {
                        DotDiv.classList.add('XL');
                    }
                } else {
                    // DotDiv.classList.add('S');
                    DotDiv.style.top = `calc(${container.clientHeight/2 + (container.clientHeight/4 * (1 / A)  )}px - 8vh)`;
                    if (leftPot <= halfParticle / 4 || leftPot >= halfParticle / 4 * 3) {
                        DotDiv.classList.add('M');
                    } else if (leftPot > halfParticle / 4 && leftPot < halfParticle / 4 * 3) {
                        DotDiv.classList.add('S');
                    }
                }

                let LeftVar;
                console.log(leftPot + '||' + halfParticle / 2)
                LeftVar = 1 / (Math.abs(leftPot - halfParticle / 2) / 10 + 1);

                if (leftPot <= halfParticle / 2) {
                    console.log('頭' + LeftVar)

                } else {
                    LeftVar = 2 - LeftVar;
                    console.log('尾' + LeftVar)
                }
                LeftVar /= 2;

                if (i % 2 == 1) {
                    DotDiv.style.left = `${(container.clientWidth) * LeftVar}px`;
                } else {
                    DotDiv.style.left = `${(container.clientWidth) * (1-LeftVar)}px`;
                }



                DotDiv.style.filter = `brightness(${(.8-Math.abs(leftPot/halfParticle - .5)) * 150}%)`;
                DotDiv.classList.add('child');
                // DotDiv.style.filter = `brightness(${(.8-Math.abs(left-.5)) * 150 }%)`;
                // DotDiv.style.left = `${left * (container.clientWidth)}px`;
                // DotDiv.style.top = `${top * (container.clientHeight - 50)}px`;   
            }, 3000 / ParticleNum * i);
        }
    }
    // function MoveDot() {
    //     let ParticleNum = <?php echo $ParticleNum; ?>;
    //     for (let i = 0; i < ParticleNum; i++) {
    //         let top = Math.random();
    //         let leftPot;
    //         let left = Math.random();
    //         let halfParticle = ParticleNum / 2
    //         setTimeout(() => {
    //             let DotDiv = document.getElementById('Particle_' + i)
    //             console.log('Particle_' + i);
    //             DotDiv.classList.remove('S', 'M', 'L', 'XL');
    //             if (top < 0.25) {
    //                 DotDiv.classList.add('S');
    //             } else if (top >= 0.25 && top < 0.5) {
    //                 DotDiv.classList.add('M');
    //             } else if (top >= 0.5 && top < 0.75) {
    //                 DotDiv.classList.add('L');
    //             } else if (top >= 0.75 && top <= 1) {
    //                 DotDiv.classList.add('XL');
    //             }

    //             if (i > halfParticle) {
    //                 leftPot = i - halfParticle;
    //             } else {
    //                 leftPot = i;
    //             }

    //             DotDiv.style.left = `${(container.clientWidth) / halfParticle * leftPot}px`;

    //             DotDiv.classList.add('child');
    //             // DotDiv.style.left = `${left * (container.clientWidth)}px`;
    //             DotDiv.style.filter = `brightness(${(.8-Math.abs(left-.5)) * 150 + (Math.random() * 30 - 15)}%)`;
    //             // DotDiv.style.top = `${top * (container.clientHeight - 50)}px`;
    //         }, 5000 / ParticleNum * i);
    //     }
    // }
    MoveDot()
    window.addEventListener('resize', MoveDot);
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