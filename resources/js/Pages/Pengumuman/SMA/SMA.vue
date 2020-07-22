<template>
    <App topnav="Profil SMA">
        <div class="row mt-sm-4">
            <div class="col-12 col-md-12 col-lg-6">
                <div class="card profile-widget">
                    <div class="profile-widget-header">
                        <img alt="image" src="/img/sma.png" class="rounded-circle profile-widget-picture">
                        <div class="profile-widget-items">
                            <div class="profile-widget-item">
                                <div class="profile-widget-item-label">Prestasi</div>
                                <div class="profile-widget-item-value">{{datasma.kuota_prestasi}}</div>
                            </div>
                            <div class="profile-widget-item">
                                <div class="profile-widget-item-label">Zonasi</div>
                                <div class="profile-widget-item-value">{{datasma.kuota}}</div>
                            </div>
                            <div class="profile-widget-item">
                                <div class="profile-widget-item-label">Pindah Tugas</div>
                                <div class="profile-widget-item-value">{{datasma.kuota_pindahtugas}}</div>
                            </div>
                            <div class="profile-widget-item">
                                <div class="profile-widget-item-label">Afirmasi</div>
                                <div class="profile-widget-item-value">{{datasma.kuota_afirmasi}}</div>
                            </div>
                        </div>
                    </div>
                    <div class="profile-widget-description">
                        <div class="profile-widget-name">{{datasma.sekolah}}
                            <div class="text-muted d-inline font-weight-normal">
                                <div class="slash"></div>
                                Provinsi Bengkulu
                            </div>
                        </div>
                        <!--                        Ujang maman is a superhero name in <b>Indonesia</b>, especially in my family. He is not a fictional character but an original hero in my family, a hero for his children and for his wife. So, I use the name as a user in this template. Not a tribute, I'm just bored with <b>'John Doe'</b>.-->
                    </div>
                    <div class="card-footer text-center">
                        <div class="font-weight-bold mb-2">Pengumuman</div>
                        <inertia-link v-on:click="render" :href="$route('pengumuman.sma.prestasi', {id: datasma.sma_id})"
                                      class="btn btn-social-icon btn-primary mr-1">
                            Prestasi
                        </inertia-link>
                        <inertia-link v-on:click="render" :href="$route('pengumuman.sma.zonasi', {id: datasma.sma_id})"
                                      class="btn btn-social-icon btn-primary mr-1">
                            Zonasi
                        </inertia-link>
                        <inertia-link v-on:click="render" :href="$route('pengumuman.sma.pindahtugas', {id: datasma.sma_id})"
                                      class="btn btn-social-icon btn-primary mr-1">
                            Pindah Tugas
                        </inertia-link>
                        <inertia-link v-on:click="render" :href="$route('pengumuman.sma.afirmasi', {id: datasma.sma_id})"
                                      class="btn btn-social-icon btn-primary mr-1">
                            Afirmasi
                        </inertia-link>

                    </div>
                </div>
            </div>
            <div class="col-12 col-md-12 col-lg-6">
                <div v-if="rendering" class="card">
                    <div class="card-body">
                        Loading...
                    </div>
                </div>
                <div v-else class="card">
                    <slot/>
                </div>
            </div>
        </div>
    </App>
</template>

<script>
    import App from "../../../Utils/Layout/App";

    export default {
        name: "SMA",
        props: {
            datasma: Object
        },
        data()
        {
            return {
                rendering: false
            }
        },
        components: {App},
        methods: {
            render()
            {
                this.rendering = true;
            }
        }
    }
</script>

<style scoped>

</style>
