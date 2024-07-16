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
        <img src="https://wolf-test-box.s3.ap-northeast-1.amazonaws.com/HarlerArt/1120706%E8%A7%92%E8%89%B2%E8%A8%AD%E8%A8%88_2.png" alt="Character">
    </div>
    <div class="ripples">
        <div class="ripple"></div>
        <div class="ripple"></div>
        <div class="ripple"></div>
        <div class="ripple"></div>
    </div>
    <div class="particles">
        <!-- 生成多個光粒子 -->
        <div class="particle" style="left: 20%; animation-delay: 0s;"></div>
        <div class="particle" style="left: 40%; animation-delay: 1s;"></div>
        <div class="particle" style="left: 60%; animation-delay: 2s;"></div>
        <div class="particle" style="left: 80%; animation-delay: 3s;"></div>
    </div>
    <div id="container" class="particles"></div>
</body>
<script>
    const container = document.getElementById('container');
    const n = 1; // 每秒生成的div數量

    function createDiv() {
        for (let i = 0; i < n; i++) {
            const div = document.createElement('div');
            div.className = 'child';
            let top = Math.random();
            let left = Math.random();
            let width = Math.floor(top * 2) + 2;
            div.style.left = `${left * (container.clientWidth - 50)}px`;
            div.style.top = `${top * (container.clientHeight - 50)}px`;
            div.style.zIndex = `${Math.floor(top * 10)}`;
            div.style.width = `${width}vw`;
            div.style.height = `${width}vw`;
            div.style.filter = `brightness(${(.8-Math.abs(left-.5)) * 150 + (Math.random() * 30 - 15)}%)`;

            container.appendChild(div);

            console.log(top)
            setTimeout(() => {
                container.removeChild(div);
            }, 5000);
        }
    }

    setInterval(createDiv, container.clientWidth / 3);
</script>

</html>