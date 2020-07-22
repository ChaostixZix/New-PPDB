<template>
    <App :topnav="'Dashboard Depan'" :breadcumb="breadcumb">
        <div class="row">
           <div class="col-12">
               <div class="jumbotron" style="background: url('img/slide.jpeg')"></div>
           </div>
            <div class="col-lg-9 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Selamat Datang</h4>
                    </div>
                    <div class="card-body">
                        <p>Selamat datang di website pengumuman PPDB SMA/SMK Provinsi Bengkulu Tahun 2020.</p>
                    </div>
                    <div class="card-footer bg-whitesmoke">

                    </div>
                </div>
            </div>
        </div>
    </App>
</template>

<script>
    import App from "../../Utils/Layout/App";

    export default {
        name: "Depan",
        data() {
            return {
                breadcumb: [
                    'Dashboard'
                ]
            }
        },
        components: {App}
    }
</script>

<style scoped>

</style>
