<script setup>
defineProps({
    game: {
        type: Object,
        required: true
    }
});
</script>

<template>

    <div class="football-pitch">
        <div class="outline marking"></div>
        <div class="box left marking"></div>
        <div class="box-d left marking"></div>
        <div class="box left small marking"></div>
        <div class="box right marking"></div>
        <div class="box-d right marking"></div>
        <div class="box right small marking"></div>
        <div class="spot left marking"></div>
        <div class="spot right marking"></div>
        <div class="spot center marking"></div>
        <div class="center-line marking"></div>
        <div class="center-circle marking"></div>
        <div class="corner top left marking"></div>
        <div class="corner top right marking"></div>
        <div class="corner bottom left marking"></div>
        <div class="corner bottom right marking"></div>
        <div class="grass"></div>
        <div class="player home gk" :class="game.home_team.sheet_name">1</div>
        <div class="player home ct" :class="game.home_team.sheet_name">2</div>
        <div class="player home ld" :class="game.home_team.sheet_name">3</div>
        <div class="player home li" :class="game.home_team.sheet_name">4</div>
        <div class="player home mc1" :class="game.home_team.sheet_name">5</div>
        <div class="player home mc2" :class="game.home_team.sheet_name">6</div>
        <div class="player home dc" :class="game.home_team.sheet_name">7</div>

        <div class="player away gk" :class="game.away_team.sheet_name">1</div>
        <div class="player away ct" :class="game.away_team.sheet_name">2</div>
        <div class="player away ld" :class="game.away_team.sheet_name">3</div>
        <div class="player away li" :class="game.away_team.sheet_name">4</div>
        <div class="player away mc1" :class="game.away_team.sheet_name">5</div>
        <div class="player away mc2" :class="game.away_team.sheet_name">6</div>
        <div class="player away dc" :class="game.away_team.sheet_name">6</div>
    </div>
</template>

<style scoped>

.football-pitch {
    @apply mt-10 mx-auto relative overflow-hidden;
    width: 640px;
    height: 380px;
    top: calc(50% - 380px / 2);
}
.marking {
    @apply bg-white absolute;
    z-index: 2;
}

.outline.marking {
    @apply w-full h-full bg-transparent;
    border: 4px solid white;
}

.center-line {
    @apply h-full top-0;
    width: 4px;
    left: calc(50% - 4px / 2);
}

.center-circle {
    width: 120px;
    height: 120px;
    border-radius: 120px;
    border: 4px solid white;
    background: none;
    top: calc(50% - 120px / 2);
    left: calc(50% - 120px / 2);
}

.box {
    top: 25%;
    width: 16%;
    height: 50%;
    background: transparent;
    border: 4px solid white;
}

.box.left {
    left: 0;
}

.box.right {
    right: 0;
}

.box.small {
    top: 36%;
    width: 8%;
    height: 28%;
}

.box-d {
    top: 35%;
    width: 15%;
    height: 30%;
    background: transparent;
    border: 4px solid white;
}

.box-d.left {
    left: 5%;
    border-left: none;
    border-bottom-right-radius: 1000px;
    border-top-right-radius: 1000px;
    clip-path: inset(0 0 0 70%);
}

.box-d.right {
    right: 5%;
    border-right: none;
    border-bottom-left-radius: 1000px;
    border-top-left-radius: 1000px;
    clip-path: inset(0 70% 0 0);
}

.spot {
    width: 4px;
    height: 4px;
    border-radius: 4px;
    top: calc(50% - 4px / 2);
}

.spot.left {
    left: 11%;
}

.spot.right {
    right: 11%;
}

.spot.center {
    width: 8px;
    height: 8px;
    left: calc(50% - 4px);
}

.corner {
    width: 40px;
    height: 40px;
    border-radius: 40px;
    background: none;
    border: 4px solid white;
}

.corner.top {
    top: -20px;
}

.corner.left {
    left: -20px;
}

.corner.bottom {
    bottom: -20px;
}

.corner.right {
    right: -20px;
}

.grass {
    width: 100%;
    height: 100%;
    background-color: #358626;
}

.grass:before {
    content: "";
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    z-index: 2;
    background-image: url('data:image/png;base64, iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAMAAAAp4XiDAAAAUVBMVEWFhYWDg4N3d3dtbW17e3t1dXWBgYGHh4d5eXlzc3OLi4ubm5uVlZWPj4+NjY19fX2JiYl/f39ra2uRkZGZmZlpaWmXl5dvb29xcXGTk5NnZ2c8TV1mAAAAG3RSTlNAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEAvEOwtAAAFVklEQVR4XpWWB67c2BUFb3g557T/hRo9/WUMZHlgr4Bg8Z4qQgQJlHI4A8SzFVrapvmTF9O7dmYRFZ60YiBhJRCgh1FYhiLAmdvX0CzTOpNE77ME0Zty/nWWzchDtiqrmQDeuv3powQ5ta2eN0FY0InkqDD73lT9c9lEzwUNqgFHs9VQce3TVClFCQrSTfOiYkVJQBmpbq2L6iZavPnAPcoU0dSw0SUTqz/GtrGuXfbyyBniKykOWQWGqwwMA7QiYAxi+IlPdqo+hYHnUt5ZPfnsHJyNiDtnpJyayNBkF6cWoYGAMY92U2hXHF/C1M8uP/ZtYdiuj26UdAdQQSXQErwSOMzt/XWRWAz5GuSBIkwG1H3FabJ2OsUOUhGC6tK4EMtJO0ttC6IBD3kM0ve0tJwMdSfjZo+EEISaeTr9P3wYrGjXqyC1krcKdhMpxEnt5JetoulscpyzhXN5FRpuPHvbeQaKxFAEB6EN+cYN6xD7RYGpXpNndMmZgM5Dcs3YSNFDHUo2LGfZuukSWyUYirJAdYbF3MfqEKmjM+I2EfhA94iG3L7uKrR+GdWD73ydlIB+6hgref1QTlmgmbM3/LeX5GI1Ux1RWpgxpLuZ2+I+IjzZ8wqE4nilvQdkUdfhzI5QDWy+kw5Wgg2pGpeEVeCCA7b85BO3F9DzxB3cdqvBzWcmzbyMiqhzuYqtHRVG2y4x+KOlnyqla8AoWWpuBoYRxzXrfKuILl6SfiWCbjxoZJUaCBj1CjH7GIaDbc9kqBY3W/Rgjda1iqQcOJu2WW+76pZC9QG7M00dffe9hNnseupFL53r8F7YHSwJWUKP2q+k7RdsxyOB11n0xtOvnW4irMMFNV4H0uqwS5ExsmP9AxbDTc9JwgneAT5vTiUSm1E7BSflSt3bfa1tv8Di3R8n3Af7MNWzs49hmauE2wP+ttrq+AsWpFG2awvsuOqbipWHgtuvuaAE+A1Z/7gC9hesnr+7wqCwG8c5yAg3AL1fm8T9AZtp/bbJGwl1pNrE7RuOX7PeMRUERVaPpEs+yqeoSmuOlokqw49pgomjLeh7icHNlG19yjs6XXOMedYm5xH2YxpV2tc0Ro2jJfxC50ApuxGob7lMsxfTbeUv07TyYxpeLucEH1gNd4IKH2LAg5TdVhlCafZvpskfncCfx8pOhJzd76bJWeYFnFciwcYfubRc12Ip/ppIhA1/mSZ/RxjFDrJC5xifFjJpY2Xl5zXdguFqYyTR1zSp1Y9p+tktDYYSNflcxI0iyO4TPBdlRcpeqjK/piF5bklq77VSEaA+z8qmJTFzIWiitbnzR794USKBUaT0NTEsVjZqLaFVqJoPN9ODG70IPbfBHKK+/q/AWR0tJzYHRULOa4MP+W/HfGadZUbfw177G7j/OGbIs8TahLyynl4X4RinF793Oz+BU0saXtUHrVBFT/DnA3ctNPoGbs4hRIjTok8i+algT1lTHi4SxFvONKNrgQFAq2/gFnWMXgwffgYMJpiKYkmW3tTg3ZQ9Jq+f8XN+A5eeUKHWvJWJ2sgJ1Sop+wwhqFVijqWaJhwtD8MNlSBeWNNWTa5Z5kPZw5+LbVT99wqTdx29lMUH4OIG/D86ruKEauBjvH5xy6um/Sfj7ei6UUVk4AIl3MyD4MSSTOFgSwsH/QJWaQ5as7ZcmgBZkzjjU1UrQ74ci1gWBCSGHtuV1H2mhSnO3Wp/3fEV5a+4wz//6qy8JxjZsmxxy5+4w9CDNJY09T072iKG0EnOS0arEYgXqYnXcYHwjTtUNAcMelOd4xpkoqiTYICWFq0JSiPfPDQdnt+4/wuqcXY47QILbgAAAABJRU5ErkJggg==');
}

.grass:after {
    content: "";
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    z-index: 1;
    background: repeating-linear-gradient(to right, rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.1) 40px, transparent 40px, transparent 80px);
}

html, body {
    height: 100%;
    margin: 0;
}

body {
    background: #333;
}

* {
    box-sizing: border-box;
}

.player {
    z-index: 3;
    width: 30px;
    height: 30px;
    border-radius: 20px;
    color: white;
    text-align: center;
    font-weight: bold;
    font-size: 20px;
    position: absolute;
}
.player.home.gk {
    top: calc(50% - 20px / 2);
    left: calc(4% - 20px / 2);
}
.player.away.gk {
    top: calc(50% - 20px / 2);
    left: calc(95% - 20px / 2);
}
.player.home.ct {
    top: calc(50% - 20px / 2);
    left: calc(15% - 20px / 2);
}
.player.away.ct {
    top: calc(50% - 20px / 2);
    left: calc(83% - 20px / 2);
}
.player.home.ld {
    top: calc(85% - 20px / 2);
    left: calc(15% - 20px / 2);
}
.player.away.ld {
    top: calc(15% - 20px / 2);
    left: calc(83% - 20px / 2);
}
.player.home.li {
    top: calc(15% - 20px / 2);
    left: calc(15% - 20px / 2);
}
.player.away.li {
    top: calc(85% - 20px / 2);
    left: calc(83% - 20px / 2);
}
.player.away.mc1 {
    top: calc(66% - 20px / 2);
    left: calc(72% - 20px / 2);
}
.player.home.mc1 {
    top: calc(32% - 20px / 2);
    left: calc(27% - 20px / 2);
}
.player.away.mc2 {
    top: calc(32% - 20px / 2);
    left: calc(72% - 20px / 2);
}
.player.home.mc2 {
    top: calc(66% - 20px / 2);
    left: calc(27% - 20px / 2);
}
.player.away.dc {
    top: calc(50% - 20px / 2);
    left: calc(58% - 20px / 2);
}
.player.home.dc {
    top: calc(50% - 20px / 2);
    left: calc(40% - 20px / 2);
}
.player.tenerife  {
    background: blue;
}
.player.segunda_parte  {
    background: #f5f5f5;
    color: #8F6CAB;
}
</style>
