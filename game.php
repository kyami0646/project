<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c:wght@300&display=swap" rel="stylesheet"> 
    <title>国旗タイピング</title>
</head>
<body>
    <header class="page_header">
        <div class="header_logo">
            <a href="login.php">国旗DEタイピング</a>
        </div>
        <div>
            <div id="time">00:00:00:000</div>
            <input id="start" type="button" value="start">
            <input id="reset" type="button" value="reset">
        </div>
        <div>
            <label for="score">得点</label>
            <input type="text" id="score" style="text-align: center;">
        </div>    
    </header>

    <main>
        <img  alt="ここに国旗が表示されます" id="image"><br>
        <span id="country_name"></span><br>
        <span id = "typed"></span><span id = "untyped">ここに国名が表示されます</span>
    </main>
    <script>
        const timeElement = document.getElementById('time');
        const start = document.getElementById('start');
        const reset = document.getElementById('reset');
        const scoreField = document.getElementById('score');
        let score = 0;
        const imageField = document.getElementById('image');
        const nameField = document.getElementById('country_name');
        const typedField = document.getElementById('typed');
        const untypedField = document.getElementById('untyped');
        const time = 60000;
        const country = [
            ['./countryImage/アメリカ.png', './countryImage/日本.png','./countryImage/中国.png','./countryImage/ロシア.png','./countryImage/ルーマニア.png','./countryImage/ルクセンブルク.png','./countryImage/ドイツ.png','./countryImage/オーストリア.png','./countryImage/ギニア.png','./countryImage/フランス.png','./countryImage/マリ.png','./countryImage/イラン.png','./countryImage/ノルウェー.png','./countryImage/トーゴ.png','./countryImage/マカオ.png','./countryImage/イラク.png','./countryImage/バルバドス.png','./countryImage/インドネシア.png','./countryImage/イスラエル.png','./countryImage/ブルンジ.png',
            './countryImage/バーレーン.png','./countryImage/南アフリカ.png','./countryImage/コロンビア.png','./countryImage/ハンガリー.png','./countryImage/カメルーン.png','./countryImage/オーストラリア.png','./countryImage/エストニア.png','./countryImage/ジブチ.png','./countryImage/モロッコ.png','./countryImage/アルメニア.png','./countryImage/モナコ.png','./countryImage/イギリス.png','./countryImage/マレーシア.png','./countryImage/カザフスタン.png','./countryImage/カーボベルデ.png','./countryImage/タイ.png','./countryImage/タンザニア.png','./countryImage/バハマ.png','./countryImage/フィンランド.png','./countryImage/マケドニア.png',
            './countryImage/カンボジア.png','./countryImage/スイス.png','./countryImage/ガイアナ.png','./countryImage/ヨルダン.png','./countryImage/パナマ.png','./countryImage/チャド.png','./countryImage/チュニジア.png','./countryImage/レバノン.png','./countryImage/モーリタニア.png','./countryImage/ソマリア.png'],
            ['アメリカ','日本','中国','ロシア','ルーマニア','ルクセンブルク','ドイツ','オーストリア','ギニア','フランス','マリ','イラン','ノルウェー','トーゴ','マカオ','イラク','バルバドス','インドネシア','イスラエル','ブルンジ','バーレーン','南アフリカ','コロンビア','ハンガリー','カメルーン','オーストラリア','エストニア','ジブチ','モロッコ','アルメニア','モナコ','イギリス','マレーシア','カザフスタン','カーボベルデ','タイ','タンザニア','バハマ','フィンランド','マケドニア',
            'カンボジア','スイス','ガイアナ','ヨルダン','パナマ','チャド','チュニジア','レバノン','モーリタニア','ソマリア'],
            ['amerika', 'nihon','tyuugoku','rosia','ru-mania','rukusenburuku','doitu','o-sutoria','ginia','huransu','mari','irann','noruwe-','to-go','makao','iraku','barubadosu','indonesia','isuraeru','burunzi','ba-re-nn','minamiahurika','koronbia','hangari-','kameru-nn','o-sutoraria','esutonia','zibuti','morokko','arumenia','monako','igirisu','mare-sia','kazahusutann','ka-boberude','tai','tanzania','bahama','finrando','makedonia',
            'kanbozia','suisu','gaiana','yorudann','panama','tyado','tyunizia','rebanonn','mo-ritania','somaria']
        ];

        function updateTextField() {
            nameField.textContent = name;
            typedField.textContent = typed;
            untypedField.textContent = untyped;
        }

        function randomInt(max) {
            return Math.floor(Math.random() * Math.floor(max));
        }
        console.log(country[0].length);
        function next() {
            let idx = randomInt(country[0].length);
            imageField.setAttribute('src',country[0][idx]);
            name = country[1][idx];
            typed = '';
            untyped = country[2][idx];
            document.getElementById('score').value = score;
            updateTextField();
        }

        function updateTime() {
            const ms = remaining % 1000;
            const s = Math.floor(remaining / 1000) % 60;
            const m = Math.floor(remaining / (1000*60)) % 60;
            const h = Math.floor(remaining / (1000*60*60));

            const msStr = ms.toString().padStart(3, '0');
            const sStr = s.toString().padStart(2, '0');
            const mStr = m.toString().padStart(2, '0');
            const hStr = h.toString().padStart(2, '0');

            timeElement.innerHTML = `${hStr}:${mStr}:${sStr}.${msStr}`;
        }

        function keyDownCallback(e) {
            if(e.key !== untyped.substring(0,1)) {return;}
            typed += untyped.substring(0,1);
            untyped = untyped.substring(1);

            updateTextField();

            if (untyped === '') {
                score ++;
                next();

            }
        };
        
        function gameStart() {
            let pre = new Date();
            intervalId = setInterval(function() {
                const now = new Date();
                remaining -= now - pre;
                updateTime();

                if (remaining < 0) {
                    gameEnd();
                }

                pre = now;
                updateTime();
            }, 10);

            document.addEventListener('keydown', keyDownCallback);
            
            next();
        }

        function gameEnd() {
            remaining = 0;
            updateTime();
            clearInterval(intervalId);
            intervalId = null;
            document.removeEventListener('keydown', keyDownCallback);
            let best_score = 0;
            window.confirm('あなたの得点は' + score + 'でした.' + 'もう一度遊ぶ場合はresetを押してください.');
            
        }

        let remaining = time;

        let intervalId = null;

        start.addEventListener('click', function(e) {
            if (intervalId !== null) {return;}
            gameStart();
        });

        reset.addEventListener('click', function(e) {
            document.removeEventListener('keydown', keyDownCallback);

            clearInterval(intervalId);
            intervalId = null;
            remaining = time;
            updateTime();
            next;
            score = 0;
        })

        

    </script>    
    

</body>
</html>