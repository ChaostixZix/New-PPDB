<template>
    <SMA :datasma="datasma">
        <div class="card">
            <div class="card-header bg-info text-white">
                Jalur Prestasi
            </div>
            <TableSMA :pesertass="pesertas"></TableSMA>
        </div>
    </SMA>
</template>

<script>
    import TableSMA from "./TableSMA";
    import App from "../../../Utils/Layout/App";
    import SMA from "./SMA";
    export default {
        components: {SMA, App, TableSMA},
        props: {
            pesertas: Array,
            datasma: Object
        },
        mounted() {
            this.$parent.rendering = false;
        }
    };
</script>
