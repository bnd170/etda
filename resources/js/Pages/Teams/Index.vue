<script setup>
import Default from "~/Layout/Default.vue";
import Spacer  from "~/Components/Layout/Spacer.vue";
import Menu    from "~/Components/Ranking/Menu.vue";
import {ref}   from "vue";

defineOptions({layout: Default})

const teams = ref([
  {
    'name': 'SD Eibar',
    'logo': 'https://upload.wikimedia.org/wikipedia/an/thumb/3/3b/SD_Eibar_logo_2016.svg/1200px-SD_Eibar_logo_2016.svg.png'
  },
  {
    'name': 'Disport Smart Joie',
    'logo': 'https://disportfccom.files.wordpress.com/2021/11/logo-disport-fc.jpg?w=500'
  },
  {
    'name': 'Hércules Paralímpico',
    'logo': 'https://seeklogo.com/images/H/hercules-c-f-logo-764933B0E5-seeklogo.com.png'
  },
  {
    'name': 'CD Tenerife',
    'logo': 'https://upload.wikimedia.org/wikipedia/en/thumb/f/f9/CD_Tenerife_logo.svg/1200px-CD_Tenerife_logo.svg.png'
  },
  {
    'name': 'Segunda Parte Elencor',
    'logo': 'https://www.fundacionsegundaparte.org/logos/logo-segunda-parte-corto.png'
  },
  {
    'name': 'Selección Extremeña',
    'logo': 'https://play-lh.googleusercontent.com/xLRkRgdBMRC-dtlIh4Mx_L1G2Xlul7KQsMp81NBZAguIOXtXbB9Jg9jT48Og_eEuJw'
  },
  {
    'name': 'CD AMDDA',
    'logo': 'https://upload.wikimedia.org/wikipedia/an/thumb/3/3b/SD_Eibar_logo_2016.svg/1200px-SD_Eibar_logo_2016.svg.png'
  },
])
</script>

<template>
  <Menu selected="teams"/>
  <Spacer/>
  <div class="flex flex-col w-full mb-5">
    <h2 class="section-header">Equipos de la Liga Nacional</h2>
  </div>
  <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-5">
    <section v-for="team in teams" class="hover:bg-base-200 p-7 rounded-2xl flex flex-col items-center">
      <a :href="route('national-league.teams.club')">
        <picture class="h-64 inline-flex items-center">
          <img :src="team.logo" :alt="`Escudo de ${team.name}`" class="object-contain max-h-full">
        </picture>
      </a>
      <h2 class="text-3xl text-center mt-4">{{ team.name }}</h2>
    </section>
  </div>

</template>
