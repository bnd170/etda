<script setup>
import {computed} from "vue";

const props = defineProps({
    goals: {
        type: Array,
        required: true,
    },
    player: {
        type: Object,
        required: true,
    },
    isHome: {
        type: Boolean,
        default: true,
    },
});

const name = computed(() => props.player.name);
const surname = computed(() => props.player.surname);
const shouldBeReversed = computed(() => !props.isHome);
</script>

<template>
    <div class="scorer">
        <div class="flex justify-end gap-2 font-normal md:font-bold items-center" :class="{'flex-row-reverse': shouldBeReversed}">
            <template v-for="(goal, index) in goals">{{ goal }}
                <template v-if="index === goals.length">,</template>
            </template>
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                 width="12" height="12" viewBox="0 0 12 12">
                <path fill="url(#pattern0)" d="M0 0h12v12H0z"/>
                <defs>
                    <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1"
                             height="1">
                        <use xlink:href="#image0_1067_14909" transform="scale(.04167)"/>
                    </pattern>
                    <image id="image0_1067_14909" width="24" height="24"
                           xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAABA5JREFUSEuNVV1oHFUU/s6d0HHFh+oiav1DsxV37p2kuGJNBZEW/O2DQqO2+GJ88L8URESxRiNW0Ye25KVi0BetlqgFf2mxECnaoqxkZ+7OJv4RSwuK1iqJJE1358iJs2V2M5t63mbOuec79zvfOZewhHmedw4RrSWiW4noemY+H0AOwO8AjjDzgTiO9xpjfh4dHW1kpaKsn4VCwc3lclsAbGbmFUsVAUAS71NKbQ2C4Lv22EUAWmuPiN4D4ANgAJlFZIDWiejFfD6/bWxsrN70txzWWt9ARB8BOA/Ap0S0g5k3A7gDgMpIOgdgN4AAwCCAcwG87bruQLlcPiXxpwGKxeJKx3EOSxARDebz+Zelkv7+fmdycrKXmQeZeX0CdIqIdtfr9ZdqtdqPctPe3t6rGo3GJwBWAhi21kph/wF4nrdMKXUIwDUADllr12Tx7nnedUqpDY7jjFQqle/bY4wx9wAQesXutdbuWQDQWm8hou2J46i19tIzNDbT7fv+Y8w8nDiPuK7bQ319fbnp6ekqgCsSxwlrrfRgkWmtNxCRqOtZa+1Yxg2eT3qx4CKix6mnp2ddHMdfpIJPWmvPSh8ulUpnz83NbSeiBwA4AE4y845qtfoMgLgZa4x5E8D9zW9mPkjGmFcBPJlKGMdxfHEURb8m/RHe3wFQyLhUEMfxpiiKhAEYY6TJorimxQLwJYAbUz93FovFJ2QytdaPEtFryfR2ass0Mw9Uq9X3jTE3AdgLYHkzWABEDSItueqQtXYoGTCpSKS280wNJ6LbwzD8PLnxKqXUZwAuWuiD7/vHknXwsLV2VzpZom0ZIncJkOOu63aXy+W/mzG+71/JzPsBdAuAZebCzMzM8qmpKZnMFjPGfAvg2k4ARPRuGIab2v1a6yEi2ioUfQjgLiJaE4ahDFuL+b7/FDO/0gFAdtVGGaiMwj4GsF4AFniW9RCGofDfYsVi8XLHcaY6AMx2dXWtGB8f/yvtT2brNwB10loXiCgCcDSO46ujKJrPqOYNIrqEmds362FrrQxXO60yLyMA3pIDyhgjCrgZwAv1en14YmLiRKIkoeD/GpVKpa7Z2VlNRHuIqJuI1i1U5Pt+HzN/ldqux4lIXqyw0Wg8V6vVfumAIhQPALhTVhoAeZyaittvrb3l9JWNMdsAPN2eqJNKJE5rfRkR/QBgWdu5PxzHWVWpVI6lORWqPkiqaYmP43h1FEXfZHAtUyvVp+0fpdRtQRAclJ8tTZOlNj8/P8LMG9sOjVlr1zYnXHye561WSn3d9tL9qZS6OwiCA83zme9tIl15AtNrexczy5zME9EFAB4EUEwSiRgk6UPW2p/SxXV80D3Pu5CIHiGi+1JvRTtLIul9AF631sr+WaS6fwHVbYlwPMxC6gAAAABJRU5ErkJggg=="/>
                </defs>
            </svg>
        </div>
        <div class="flex text-lg -mt-1 items-center" :class="{'justify-end': !shouldBeReversed, 'justify-start': shouldBeReversed}">
            <span class="hidden md:inline">{{ name }}</span>
            <span class="surname">{{ surname }}</span>
        </div>
    </div>
</template>

<style scoped>
.surname {
    @apply font-extrabold ml-2 overflow-hidden text-ellipsis text-sm md:text-lg;
    text-wrap: nowrap;
}
</style>
