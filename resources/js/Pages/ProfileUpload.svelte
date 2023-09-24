<script>
    //import { router ,useForm } from '@inertiajs/inertia-svelte';
    import { router, useForm ,inertia ,} from '@inertiajs/svelte';
    let form = useForm({
        image: null,
    });

    async function submit() {
        router.post('/profile/upload',form);
    }
</script>

<form on:submit|preventDefault={submit}>
    <label for="image">Choose an image:</label>
    <input type="file" id="image" bind:files={form.image} accept="image/*" required>
    <button type="submit">Upload</button>
</form>
