<script setup>
import { Menu, MenuItem } from 'daisy-ui-kit';
import { usePage } from '@inertiajs/vue3'

defineProps({
    selected: {
        type: String,
        default: null,
    },
});

const page = usePage()
const is = (component) => page.component.includes(component)
</script>

<template>
    <nav>
        <Menu class="menu-md menu-horizontal">
            <MenuItem :active="is('Teams/')">
                <a :href="route('national-league.teams')">Equipos</a>
            </MenuItem>
            <MenuItem>
                <a>Calendario</a>
            </MenuItem>
            <MenuItem>
                <a>Estadisticas</a>
            </MenuItem>
        </Menu>
    </nav>
</template>
