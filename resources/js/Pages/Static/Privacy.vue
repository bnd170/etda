<script setup>
import Default from "~/Layout/Default.vue";
import {Head}  from "@inertiajs/vue3";

defineOptions({layout: Default})
const header = '/img/el-proyecto.webp'
</script>
<template>
    <Head>
        <title>Politica de privacidad</title>
    </Head>
    <div class="container mx-auto">
        <img :src="header" alt="Logo" class="object-contain">
    </div>
    <div class="container static 2xl:mx-auto flex flex-col gap-6 md:px-20 px-10 mt-10">
        <h1 class="text-4xl font-[Cabin] ">Politica de privacidad</h1>

        <h2 class="title">Responsable del tratamiento de datos</h2>
        <p>DAVID TREPAT SEGURA (en adelante El Talón de Aquiles) provisto de DNI 47729457H, actúa como titular,
            dinamizador y gestor de contenidos de la presente web. En consecuencia, El Talón de Aquiles es el
            Responsable de Tratamiento de sus datos. El Usuario podrá contactar con el Responsable de Tratamiento por
            alguno de los medios expuestos a continuación:</p>
        <p class="pl-5"> Dirección de correo electrónico: <a class="font-bold text-indigo-500"
                                                             href="mailto:hola@eltalondeaquiles.es">📩
            hola@eltalondeaquiles.es</a></p>
        <p>El Talón de Aquiles informa a los Usuarios que cumple con la normativa vigente y aplicable en materia de
            protección de datos, y especialmente con el Reglamento 2016/679 del Parlamento Europeo y del Consejo y con
            Ley Orgánica 3/2018, de 5 de diciembre, de Protección de Datos Personales y garantía de los derechos
            digitales.
        </p>
        <p>Asimismo, se informa a los Usuarios que la presente política de protección de datos puede sufrir
            modificaciones debido a cambios legislativos en materia de protección de datos o cambios de criterios
            interpretativos de la Agencia Española de Protección de Datos y/u organizaciones de análoga naturaleza. En
            dicho supuesto, se avisará a los Usuarios de los cambios introducidos con antelación suficiente.
        </p>

        <h2 class="title">Finalidad del tratamiento de datos</h2>
        <p>Los datos que se recojan mediante la presente página web, excluyendo los recabados por las cookies del
            proveedor de la infraestructura para la página web, que no recaban datos personales sin el consentimiento
            explícito del Usuario, se trataran para las siguientes finalidades:
        </p>
        <ol class="list-decimal pl-10 list-inside">
            <li>Participar en los concursos y actividades que realice el Talón de Aquiles en los que se precise de una
                clasificación o identificación del Usuario.
            </li>
            <li>Enviar al Usuario información sobre la actualidad del fútbol-7 para personas con parálisis cerebral y
                daño cerebral adquirido en el ámbito español e internacional.
            </li>
        </ol>
        <p>Los datos recabados serán únicamente aquellos que nos facilite el Usuario mediante la cumplimentación de los
            formularios existentes en la presente web. </p>
        <p>Asimismo, dichos datos serán únicamente tratados con las finalidades determinadas, explícitas y legítimas
            expuestas anteriormente, a parte de las finalidades exigidas por una norma con rango legal. En este sentido,
            si con posterioridad se requiriese hacer un tratamiento distinto a los mencionados, se facilitará al Usuario
            toda la información necesaria y se le solicitará su consentimiento explícito y expreso para poder tratar sus
            datos para dicha finalidad diferente.
        </p>


        <h2 class="title">Legitimación</h2>
        <p>El consentimiento libre, explícito, expreso e inequívoco constituye la legitimación para el tratamiento de
            los datos personales facilitados por el Usuario para las finalidades expuestas anteriormente.</p>
        <p>Mediante la marcación de la casilla “<span class="bg-cyan-300/40">He leído y acepto la Política de Privacidad</span>”, el Usuario declara haber
            leído la presente política y estar conforme con su contenido. Asimismo, declara estar conforme con el
            tratamiento de los datos para los fines expuestos. Dicho consentimiento podrá ser revocado en cualquier
            momento, en ejercicio de los derechos del Usuario.</p>
        <p>Finalmente, se informa al Usuario, que la negativa a facilitar datos o a consentir su tratamiento pueden
            comportar la imposibilidad de acceso a los servicios de El Talón de Aquiles.</p>


        <h2 class="title">Conservación de datos</h2>
        <p>Los datos personales proporcionados se conservarán durante el tiempo necesario para cumplir con la finalidad
            para la que se recaban, pudiendo el Usuario revocar dicho consentimiento en cualquier momento, excepto que
            la legislación vigente obligue a la conservación de datos durante un período determinado.</p>


        <h2 class="title">Comunicación de datos</h2>
        <p>Con carácter general no se comunicarán los datos personales a terceros de los Usuarios de la web.</p>
        <p>Asimismo, se informa que en ningún caso habrá transferencia internacional de los datos personales
            facilitados.</p>


        <h2 class="title">Derechos de las personas interesadas</h2>
        <p>Puede ejercer sus derechos de acceso, rectificación, supresión y portabilidad de sus datos, de limitación y
            oposición a su tratamiento, así como a no ser objeto de decisiones basadas únicamente en el tratamiento
            automatizado de sus datos, cuando procedan, ante David Trepat Segura, o en la dirección de correo
            electrónico <a class="font-bold text-indigo-500"
                           href="mailto:hola@eltalondeaquiles.es">hola@eltalondeaquiles.es</a>.</p>
    </div>
</template>
