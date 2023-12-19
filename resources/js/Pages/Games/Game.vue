<script setup>
import {statPercent} from "~/Utils/numbers.js";
import Default       from "~/Layout/Default.vue";
import Spacer        from "~/Components/Layout/Spacer.vue";
import Menu          from "~/Components/Ranking/Menu.vue";
import GameInfo      from "~/Components/Games/Game/GameInfo.vue";
import GameTeam      from "~/Components/Games/Game/GameTeam.vue";
import GameScore     from "~/Components/Games/Game/GameScore.vue";
import GameStat      from "~/Components/Games/Game/GameStat.vue";

defineOptions({layout: Default})

const props = defineProps({
    game: {
        type: Object,
        required: true
    },
});


const colors = {
    extremadura: {
        start: '#00e164',
        end: '#00AF43'
    },
    hercules: {
        start: '#352ea2',
        end: '#656398'
    },
    amdda: {
        start: '#9015A1',
        end: '#4e0c59'
    },
    eibar: {
        start: '#0071B9',
        end: '#02598f'
    },
    tenerife: {
        start: '#17369d',
        end: '#173ebe'
    },
    segunda_parte: {
        start: '#dedede',
        end: '#fff'
    },
    disport: {
        start: '#FEEA2B',
        end: '#d3c21c'
    }
}
</script>

<template>
    <Menu/>
    <Spacer/>
    <div class="flex flex-col w-full">
        <div class="match-summary">
            <GameInfo :game="game" start/>
            <div class="match-summary__teams_container">
                <GameTeam team_position="home" :colors="colors" :score="game.home_team_score" :team="game.home_team"/>
                <GameScore :game="game"/>
                <GameTeam team_position="away" :colors="colors" :score="game.away_team_score" :team="game.away_team"/>
            </div>
            <GameInfo :game="game"/>

            <div class="match-summary__teams_container-goals">
                <div class="w-5/12">
                    <div class="scorer">
                        <div class="flex justify-end gap-2 font-bold items-center">12'
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                 width="12" height="12" viewBox="0 0 12 12">
                                <path fill="url(#pattern0)" d="M0 0h12v12H0z"/>
                                <defs>
                                    <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1">
                                        <use xlink:href="#image0_1067_14909" transform="scale(.04167)"/>
                                    </pattern>
                                    <image id="image0_1067_14909" width="24" height="24"
                                           xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAABA5JREFUSEuNVV1oHFUU/s6d0HHFh+oiav1DsxV37p2kuGJNBZEW/O2DQqO2+GJ88L8URESxRiNW0Ye25KVi0BetlqgFf2mxECnaoqxkZ+7OJv4RSwuK1iqJJE1358iJs2V2M5t63mbOuec79zvfOZewhHmedw4RrSWiW4noemY+H0AOwO8AjjDzgTiO9xpjfh4dHW1kpaKsn4VCwc3lclsAbGbmFUsVAUAS71NKbQ2C4Lv22EUAWmuPiN4D4ANgAJlFZIDWiejFfD6/bWxsrN70txzWWt9ARB8BOA/Ap0S0g5k3A7gDgMpIOgdgN4AAwCCAcwG87bruQLlcPiXxpwGKxeJKx3EOSxARDebz+Zelkv7+fmdycrKXmQeZeX0CdIqIdtfr9ZdqtdqPctPe3t6rGo3GJwBWAhi21kph/wF4nrdMKXUIwDUADllr12Tx7nnedUqpDY7jjFQqle/bY4wx9wAQesXutdbuWQDQWm8hou2J46i19tIzNDbT7fv+Y8w8nDiPuK7bQ319fbnp6ekqgCsSxwlrrfRgkWmtNxCRqOtZa+1Yxg2eT3qx4CKix6mnp2ddHMdfpIJPWmvPSh8ulUpnz83NbSeiBwA4AE4y845qtfoMgLgZa4x5E8D9zW9mPkjGmFcBPJlKGMdxfHEURb8m/RHe3wFQyLhUEMfxpiiKhAEYY6TJorimxQLwJYAbUz93FovFJ2QytdaPEtFryfR2ass0Mw9Uq9X3jTE3AdgLYHkzWABEDSItueqQtXYoGTCpSKS280wNJ6LbwzD8PLnxKqXUZwAuWuiD7/vHknXwsLV2VzpZom0ZIncJkOOu63aXy+W/mzG+71/JzPsBdAuAZebCzMzM8qmpKZnMFjPGfAvg2k4ARPRuGIab2v1a6yEi2ioUfQjgLiJaE4ahDFuL+b7/FDO/0gFAdtVGGaiMwj4GsF4AFniW9RCGofDfYsVi8XLHcaY6AMx2dXWtGB8f/yvtT2brNwB10loXiCgCcDSO46ujKJrPqOYNIrqEmds362FrrQxXO60yLyMA3pIDyhgjCrgZwAv1en14YmLiRKIkoeD/GpVKpa7Z2VlNRHuIqJuI1i1U5Pt+HzN/ldqux4lIXqyw0Wg8V6vVfumAIhQPALhTVhoAeZyaittvrb3l9JWNMdsAPN2eqJNKJE5rfRkR/QBgWdu5PxzHWVWpVI6lORWqPkiqaYmP43h1FEXfZHAtUyvVp+0fpdRtQRAclJ8tTZOlNj8/P8LMG9sOjVlr1zYnXHye561WSn3d9tL9qZS6OwiCA83zme9tIl15AtNrexczy5zME9EFAB4EUEwSiRgk6UPW2p/SxXV80D3Pu5CIHiGi+1JvRTtLIul9AF631sr+WaS6fwHVbYlwPMxC6gAAAABJRU5ErkJggg=="/>
                                </defs>
                            </svg>
                        </div>
                        <div class="flex justify-end text-lg -mt-1 items-center">Jorge <span
                            class="font-extrabold ml-2">DEL BARCO</span></div>
                    </div>
                </div>
                <div class="w-2/12"></div>
                <div class="w-5/12">
                    <div class="scorer">
                        <div class="flex flex-row-reverse justify-end gap-2 font-bold items-center">12', 18', 21', 22'
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                 width="12" height="12" viewBox="0 0 12 12">
                                <path fill="url(#pattern0)" d="M0 0h12v12H0z"/>
                                <defs>
                                    <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1">
                                        <use xlink:href="#image0_1067_14909" transform="scale(.04167)"/>
                                    </pattern>
                                    <image id="image0_1067_14909" width="24" height="24"
                                           xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAABA5JREFUSEuNVV1oHFUU/s6d0HHFh+oiav1DsxV37p2kuGJNBZEW/O2DQqO2+GJ88L8URESxRiNW0Ye25KVi0BetlqgFf2mxECnaoqxkZ+7OJv4RSwuK1iqJJE1358iJs2V2M5t63mbOuec79zvfOZewhHmedw4RrSWiW4noemY+H0AOwO8AjjDzgTiO9xpjfh4dHW1kpaKsn4VCwc3lclsAbGbmFUsVAUAS71NKbQ2C4Lv22EUAWmuPiN4D4ANgAJlFZIDWiejFfD6/bWxsrN70txzWWt9ARB8BOA/Ap0S0g5k3A7gDgMpIOgdgN4AAwCCAcwG87bruQLlcPiXxpwGKxeJKx3EOSxARDebz+Zelkv7+fmdycrKXmQeZeX0CdIqIdtfr9ZdqtdqPctPe3t6rGo3GJwBWAhi21kph/wF4nrdMKXUIwDUADllr12Tx7nnedUqpDY7jjFQqle/bY4wx9wAQesXutdbuWQDQWm8hou2J46i19tIzNDbT7fv+Y8w8nDiPuK7bQ319fbnp6ekqgCsSxwlrrfRgkWmtNxCRqOtZa+1Yxg2eT3qx4CKix6mnp2ddHMdfpIJPWmvPSh8ulUpnz83NbSeiBwA4AE4y845qtfoMgLgZa4x5E8D9zW9mPkjGmFcBPJlKGMdxfHEURb8m/RHe3wFQyLhUEMfxpiiKhAEYY6TJorimxQLwJYAbUz93FovFJ2QytdaPEtFryfR2ass0Mw9Uq9X3jTE3AdgLYHkzWABEDSItueqQtXYoGTCpSKS280wNJ6LbwzD8PLnxKqXUZwAuWuiD7/vHknXwsLV2VzpZom0ZIncJkOOu63aXy+W/mzG+71/JzPsBdAuAZebCzMzM8qmpKZnMFjPGfAvg2k4ARPRuGIab2v1a6yEi2ioUfQjgLiJaE4ahDFuL+b7/FDO/0gFAdtVGGaiMwj4GsF4AFniW9RCGofDfYsVi8XLHcaY6AMx2dXWtGB8f/yvtT2brNwB10loXiCgCcDSO46ujKJrPqOYNIrqEmds362FrrQxXO60yLyMA3pIDyhgjCrgZwAv1en14YmLiRKIkoeD/GpVKpa7Z2VlNRHuIqJuI1i1U5Pt+HzN/ldqux4lIXqyw0Wg8V6vVfumAIhQPALhTVhoAeZyaittvrb3l9JWNMdsAPN2eqJNKJE5rfRkR/QBgWdu5PxzHWVWpVI6lORWqPkiqaYmP43h1FEXfZHAtUyvVp+0fpdRtQRAclJ8tTZOlNj8/P8LMG9sOjVlr1zYnXHye561WSn3d9tL9qZS6OwiCA83zme9tIl15AtNrexczy5zME9EFAB4EUEwSiRgk6UPW2p/SxXV80D3Pu5CIHiGi+1JvRTtLIul9AF631sr+WaS6fwHVbYlwPMxC6gAAAABJRU5ErkJggg=="/>
                                </defs>
                            </svg>
                        </div>
                        <div class="flex justify-start text-lg -mt-1 items-center">Santiago <span
                            class="font-extrabold ml-2">MACIÁ</span></div>
                    </div>
                    <div class="scorer">
                        <div class="flex flex-row-reverse justify-end gap-2 font-bold items-center">5', 43'
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                 width="12" height="12" viewBox="0 0 12 12">
                                <path fill="url(#pattern0)" d="M0 0h12v12H0z"/>
                                <defs>
                                    <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1">
                                        <use xlink:href="#image0_1067_14909" transform="scale(.04167)"/>
                                    </pattern>
                                    <image id="image0_1067_14909" width="24" height="24"
                                           xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAABA5JREFUSEuNVV1oHFUU/s6d0HHFh+oiav1DsxV37p2kuGJNBZEW/O2DQqO2+GJ88L8URESxRiNW0Ye25KVi0BetlqgFf2mxECnaoqxkZ+7OJv4RSwuK1iqJJE1358iJs2V2M5t63mbOuec79zvfOZewhHmedw4RrSWiW4noemY+H0AOwO8AjjDzgTiO9xpjfh4dHW1kpaKsn4VCwc3lclsAbGbmFUsVAUAS71NKbQ2C4Lv22EUAWmuPiN4D4ANgAJlFZIDWiejFfD6/bWxsrN70txzWWt9ARB8BOA/Ap0S0g5k3A7gDgMpIOgdgN4AAwCCAcwG87bruQLlcPiXxpwGKxeJKx3EOSxARDebz+Zelkv7+fmdycrKXmQeZeX0CdIqIdtfr9ZdqtdqPctPe3t6rGo3GJwBWAhi21kph/wF4nrdMKXUIwDUADllr12Tx7nnedUqpDY7jjFQqle/bY4wx9wAQesXutdbuWQDQWm8hou2J46i19tIzNDbT7fv+Y8w8nDiPuK7bQ319fbnp6ekqgCsSxwlrrfRgkWmtNxCRqOtZa+1Yxg2eT3qx4CKix6mnp2ddHMdfpIJPWmvPSh8ulUpnz83NbSeiBwA4AE4y845qtfoMgLgZa4x5E8D9zW9mPkjGmFcBPJlKGMdxfHEURb8m/RHe3wFQyLhUEMfxpiiKhAEYY6TJorimxQLwJYAbUz93FovFJ2QytdaPEtFryfR2ass0Mw9Uq9X3jTE3AdgLYHkzWABEDSItueqQtXYoGTCpSKS280wNJ6LbwzD8PLnxKqXUZwAuWuiD7/vHknXwsLV2VzpZom0ZIncJkOOu63aXy+W/mzG+71/JzPsBdAuAZebCzMzM8qmpKZnMFjPGfAvg2k4ARPRuGIab2v1a6yEi2ioUfQjgLiJaE4ahDFuL+b7/FDO/0gFAdtVGGaiMwj4GsF4AFniW9RCGofDfYsVi8XLHcaY6AMx2dXWtGB8f/yvtT2brNwB10loXiCgCcDSO46ujKJrPqOYNIrqEmds362FrrQxXO60yLyMA3pIDyhgjCrgZwAv1en14YmLiRKIkoeD/GpVKpa7Z2VlNRHuIqJuI1i1U5Pt+HzN/ldqux4lIXqyw0Wg8V6vVfumAIhQPALhTVhoAeZyaittvrb3l9JWNMdsAPN2eqJNKJE5rfRkR/QBgWdu5PxzHWVWpVI6lORWqPkiqaYmP43h1FEXfZHAtUyvVp+0fpdRtQRAclJ8tTZOlNj8/P8LMG9sOjVlr1zYnXHye561WSn3d9tL9qZS6OwiCA83zme9tIl15AtNrexczy5zME9EFAB4EUEwSiRgk6UPW2p/SxXV80D3Pu5CIHiGi+1JvRTtLIul9AF631sr+WaS6fwHVbYlwPMxC6gAAAABJRU5ErkJggg=="/>
                                </defs>
                            </svg>
                        </div>
                        <div class="flex justify-start text-lg -mt-1 items-center">Diego <span
                            class="font-extrabold ml-2">BARRETO</span></div>
                    </div>
                    <div class="scorer">
                        <div class="flex flex-row-reverse justify-end gap-2 font-bold items-center">55'
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                 width="12" height="12" viewBox="0 0 12 12">
                                <path fill="url(#pattern0)" d="M0 0h12v12H0z"/>
                                <defs>
                                    <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1">
                                        <use xlink:href="#image0_1067_14909" transform="scale(.04167)"/>
                                    </pattern>
                                    <image id="image0_1067_14909" width="24" height="24"
                                           xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAABA5JREFUSEuNVV1oHFUU/s6d0HHFh+oiav1DsxV37p2kuGJNBZEW/O2DQqO2+GJ88L8URESxRiNW0Ye25KVi0BetlqgFf2mxECnaoqxkZ+7OJv4RSwuK1iqJJE1358iJs2V2M5t63mbOuec79zvfOZewhHmedw4RrSWiW4noemY+H0AOwO8AjjDzgTiO9xpjfh4dHW1kpaKsn4VCwc3lclsAbGbmFUsVAUAS71NKbQ2C4Lv22EUAWmuPiN4D4ANgAJlFZIDWiejFfD6/bWxsrN70txzWWt9ARB8BOA/Ap0S0g5k3A7gDgMpIOgdgN4AAwCCAcwG87bruQLlcPiXxpwGKxeJKx3EOSxARDebz+Zelkv7+fmdycrKXmQeZeX0CdIqIdtfr9ZdqtdqPctPe3t6rGo3GJwBWAhi21kph/wF4nrdMKXUIwDUADllr12Tx7nnedUqpDY7jjFQqle/bY4wx9wAQesXutdbuWQDQWm8hou2J46i19tIzNDbT7fv+Y8w8nDiPuK7bQ319fbnp6ekqgCsSxwlrrfRgkWmtNxCRqOtZa+1Yxg2eT3qx4CKix6mnp2ddHMdfpIJPWmvPSh8ulUpnz83NbSeiBwA4AE4y845qtfoMgLgZa4x5E8D9zW9mPkjGmFcBPJlKGMdxfHEURb8m/RHe3wFQyLhUEMfxpiiKhAEYY6TJorimxQLwJYAbUz93FovFJ2QytdaPEtFryfR2ass0Mw9Uq9X3jTE3AdgLYHkzWABEDSItueqQtXYoGTCpSKS280wNJ6LbwzD8PLnxKqXUZwAuWuiD7/vHknXwsLV2VzpZom0ZIncJkOOu63aXy+W/mzG+71/JzPsBdAuAZebCzMzM8qmpKZnMFjPGfAvg2k4ARPRuGIab2v1a6yEi2ioUfQjgLiJaE4ahDFuL+b7/FDO/0gFAdtVGGaiMwj4GsF4AFniW9RCGofDfYsVi8XLHcaY6AMx2dXWtGB8f/yvtT2brNwB10loXiCgCcDSO46ujKJrPqOYNIrqEmds362FrrQxXO60yLyMA3pIDyhgjCrgZwAv1en14YmLiRKIkoeD/GpVKpa7Z2VlNRHuIqJuI1i1U5Pt+HzN/ldqux4lIXqyw0Wg8V6vVfumAIhQPALhTVhoAeZyaittvrb3l9JWNMdsAPN2eqJNKJE5rfRkR/QBgWdu5PxzHWVWpVI6lORWqPkiqaYmP43h1FEXfZHAtUyvVp+0fpdRtQRAclJ8tTZOlNj8/P8LMG9sOjVlr1zYnXHye561WSn3d9tL9qZS6OwiCA83zme9tIl15AtNrexczy5zME9EFAB4EUEwSiRgk6UPW2p/SxXV80D3Pu5CIHiGi+1JvRTtLIul9AF631sr+WaS6fwHVbYlwPMxC6gAAAABJRU5ErkJggg=="/>
                                </defs>
                            </svg>
                        </div>
                        <div class="flex justify-start text-lg -mt-1 items-center">Dario <span
                            class="font-extrabold ml-2">SERRANO</span></div>
                    </div>
                    <div class="scorer">
                        <div class="flex flex-row-reverse justify-end gap-2 font-bold items-center">2'
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                 width="12" height="12" viewBox="0 0 12 12">
                                <path fill="url(#pattern0)" d="M0 0h12v12H0z"/>
                                <defs>
                                    <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1">
                                        <use xlink:href="#image0_1067_14909" transform="scale(.04167)"/>
                                    </pattern>
                                    <image id="image0_1067_14909" width="24" height="24"
                                           xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAABA5JREFUSEuNVV1oHFUU/s6d0HHFh+oiav1DsxV37p2kuGJNBZEW/O2DQqO2+GJ88L8URESxRiNW0Ye25KVi0BetlqgFf2mxECnaoqxkZ+7OJv4RSwuK1iqJJE1358iJs2V2M5t63mbOuec79zvfOZewhHmedw4RrSWiW4noemY+H0AOwO8AjjDzgTiO9xpjfh4dHW1kpaKsn4VCwc3lclsAbGbmFUsVAUAS71NKbQ2C4Lv22EUAWmuPiN4D4ANgAJlFZIDWiejFfD6/bWxsrN70txzWWt9ARB8BOA/Ap0S0g5k3A7gDgMpIOgdgN4AAwCCAcwG87bruQLlcPiXxpwGKxeJKx3EOSxARDebz+Zelkv7+fmdycrKXmQeZeX0CdIqIdtfr9ZdqtdqPctPe3t6rGo3GJwBWAhi21kph/wF4nrdMKXUIwDUADllr12Tx7nnedUqpDY7jjFQqle/bY4wx9wAQesXutdbuWQDQWm8hou2J46i19tIzNDbT7fv+Y8w8nDiPuK7bQ319fbnp6ekqgCsSxwlrrfRgkWmtNxCRqOtZa+1Yxg2eT3qx4CKix6mnp2ddHMdfpIJPWmvPSh8ulUpnz83NbSeiBwA4AE4y845qtfoMgLgZa4x5E8D9zW9mPkjGmFcBPJlKGMdxfHEURb8m/RHe3wFQyLhUEMfxpiiKhAEYY6TJorimxQLwJYAbUz93FovFJ2QytdaPEtFryfR2ass0Mw9Uq9X3jTE3AdgLYHkzWABEDSItueqQtXYoGTCpSKS280wNJ6LbwzD8PLnxKqXUZwAuWuiD7/vHknXwsLV2VzpZom0ZIncJkOOu63aXy+W/mzG+71/JzPsBdAuAZebCzMzM8qmpKZnMFjPGfAvg2k4ARPRuGIab2v1a6yEi2ioUfQjgLiJaE4ahDFuL+b7/FDO/0gFAdtVGGaiMwj4GsF4AFniW9RCGofDfYsVi8XLHcaY6AMx2dXWtGB8f/yvtT2brNwB10loXiCgCcDSO46ujKJrPqOYNIrqEmds362FrrQxXO60yLyMA3pIDyhgjCrgZwAv1en14YmLiRKIkoeD/GpVKpa7Z2VlNRHuIqJuI1i1U5Pt+HzN/ldqux4lIXqyw0Wg8V6vVfumAIhQPALhTVhoAeZyaittvrb3l9JWNMdsAPN2eqJNKJE5rfRkR/QBgWdu5PxzHWVWpVI6lORWqPkiqaYmP43h1FEXfZHAtUyvVp+0fpdRtQRAclJ8tTZOlNj8/P8LMG9sOjVlr1zYnXHye561WSn3d9tL9qZS6OwiCA83zme9tIl15AtNrexczy5zME9EFAB4EUEwSiRgk6UPW2p/SxXV80D3Pu5CIHiGi+1JvRTtLIul9AF631sr+WaS6fwHVbYlwPMxC6gAAAABJRU5ErkJggg=="/>
                                </defs>
                            </svg>
                        </div>
                        <div class="flex justify-start text-lg -mt-1 items-center">Noé <span
                            class="font-extrabold ml-2">ABDELL</span></div>
                    </div>
                </div>
            </div>

            <div class="match-stats">
                <h2 class="text-2xl font-bold pl-5 pt-5 mb-10">ESTADISTICAS</h2>
                <div class="flex flex-col gap-5 w-full pb-16 px-5">
                    <div class="match-stats__row flex">
                        <div class="w-4/12"></div>
                        <div class="w-4/12 font-bold text-lg text-center">
                            <img :src="game.home_team.logo" :alt="game.home_team.name" class="w-8 mx-auto inline-block">
                            {{ game.home_team.tag }}
                        </div>
                        <div class="w-4/12 font-bold text-lg text-center">
                            <img :src="game.away_team.logo" :alt="game.away_team.name" class="w-8 mx-auto inline-block">
                            {{ game.away_team.tag }}
                        </div>
                    </div>
                    <GameStat :game="game" :colors="colors" statName="possession"/>
                    <GameStat :game="game" :colors="colors" statName="shoots"/>
                    <GameStat :game="game" :colors="colors" statName="effectivity"/>
                    <GameStat :game="game" :colors="colors" statName="passes"/>
                    <GameStat :game="game" :colors="colors" statName="steals"/>
                    <GameStat :game="game" :colors="colors" statName="fouls"/>
                    <GameStat :game="game" :colors="colors" statName="corners"/>
                    <GameStat :game="game" :colors="colors" statName="yellowCards"/>
                    <GameStat :game="game" :colors="colors" statName="redCards"/>
                    <GameStat :game="game" :colors="colors" statName="penalties"/>
                </div>
            </div>
        </div>

        <!--        <h2 class="section-header">{{ game }}</h2>-->
    </div>
</template>

<style scoped>
.match-summary {
    @apply flex flex-col w-full px-40;
}

.match-summary .match-summary__teams_container {
    @apply flex flex-row w-full relative items-start z-10;
}

.match-summary .match-summary__teams_container-goals {
    @apply flex flex-row w-2/3 mx-auto relative items-start bg-white pb-5 pt-20 -mt-14 z-0;
}

.match-stats {
    @apply mt-20 bg-white;
}
</style>
