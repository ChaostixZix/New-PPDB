<template>
    <App topnav="List SMA">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4></h4>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled user-progress list-unstyled-border list-unstyled-noborder">
                            <li v-for="sma in sma" class="media">
                                <img alt="image" class="mr-3 rounded-circle" src="/img/sma.png"
                                     width="50">
                                <div class="media-body">
                                    <div class="media-title">{{sma.sekolah}}</div>
                                    <div class="text-job text-muted">Web Developer</div>
                                </div>
                                <div class="media-cta">
                                    <inertia-link :href="$route('pengumuman.sma.profil', {id: sma.sma_id})" class="btn btn-outline-primary">Detail</inertia-link>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </App>
</template>

<script>
    import App from "../../../Utils/Layout/App";

    export default {
        name: "ListSMA",
        props: {
            sma: Array
        },
        components: {App}
    }
</script>

<style scoped>

</style>
