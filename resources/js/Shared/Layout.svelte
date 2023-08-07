<script>
    import Header from '@/Shared/Header.svelte';
    import Footer from '@/Shared/Footer.svelte';
    import 'bootstrap/dist/css/bootstrap.min.css';
</script>

<Header />
<div class="container">
    <slot></slot>
</div>
<Footer />