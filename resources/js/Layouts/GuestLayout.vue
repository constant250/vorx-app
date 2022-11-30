<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/inertia-vue3';
import { loadFull } from "tsparticles";

const particlesInit = async engine => {
    await loadFull(engine);
};
const particlesLoaded = async container => {
    console.log("Particles container loaded", container);
};
const particlesOptions = {
    particles: {
        number: {
            value: 50,
            density: {
                enable: true,
                value_area: 700
            }
        },
        color: {
            value: '#ffffff'
        },
        shape: {
            type: 'circle',
            stroke: {
                width: 0,
                color: '#000000'
            },
            polygon: {
                nb_sides: 5
            },
        },
        opacity: {
            value: 0.5,
            random: false,
            anim: {
                enable: false,
                speed: 1,
                opacity_min: 0.1,
                sync: false
            }
        },
        size: {
            value: 2,
            random: true,
            anim: {
                enable: false,
                speed: 40,
                size_min: 0.1,
                sync: false
            }
        },
        line_linked: {
            enable: true,
            distance: 100,
            color: '#ffffff',
            opacity: 0.4,
            width: 0.5
        },
        move: {
            enable: true,
            speed: 2,
            direction: 'none',
            random: true,
            straight: false,
            out_mode: 'out',
            bounce: false,
            attract: {
                enable: false,
                rotateX: 600,
                rotateY: 1200
            }
        }
    },
    interactivity: {
        detect_on: 'canvas',
        events: {
            onhover: {
                enable: true,
                mode: 'grab'
            },
            resize: false
        },
        modes: {
            grab: {
                distance: 140,
                line_linked: {
                    opacity: 1
                }
            },
            bubble: {
                distance: 400,
                size: 40,
                duration: 2,
                opacity: 8,
                speed: 3
            },
            repulse: {
                distance: 200,
                duration: 0.4
            },
            push: {
                particles_nb: 4
            },
            remove: {
                particles_nb: 2
            }
        }
    },
    retina_detect: true
};
</script>

<style scoped>
.container {
    max-width: 555px;
}

.auth-wrapper {
    background: #2c2d44;
    background-image: -moz-linear-gradient(45deg, #3f3251 2%, #002025 100%);
    background-image: -webkit-linear-gradient(45deg, #3f3251 2%, #002025 100%);
    background-image: linear-gradient(45deg, #3f3251 2%, #002025 100%);
}
</style>

<template>
    <div class="auth-wrapper min-h-screen flex flex-col justify-center items-center">
         <Particles id="tsparticles" :particlesInit="particlesInit" :particlesLoaded="particlesLoaded" :options="particlesOptions" />
        <div class="z-40">
            <Link href="/">
            <ApplicationLogo class="w-20 h-20 fill-current text-slate-300 mb-5" />
            </Link>
        </div>
        <div class="container">
            <slot />
        </div>
    </div>
</template>
