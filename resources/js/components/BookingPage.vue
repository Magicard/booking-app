<template class="content-center" id="body">
    <div class="grid-3 content-center w-full">
        <div class="flex justify-between items-center py-10 px-10 bg-black text-white">
            <div class="text-4xl font-bold antialiased">Booking Page</div>
            <button @click="showModal = !showModal"  class="bg-white text-black text-2xl font-bold antialiased px-4 py-2 rounded hover:bg-gray-200">
                Create a Booking
            </button>
        </div>
        <div class="w-full border-b-5 border-gray-900"></div>
        <div v-if="showModal" class="fixed inset-0 bg-opacity-50 flex items-center justify-center" @click.self="showModal = false">
            <div class="flex justify-center mt-15 border-2 w-100 p-4 rounded border-gray-700 shadow mx-auto bg-white" id="card">
            <form @submit.prevent="submitBooking" class="space-y-4">
                <h3 class=" text-2xl font-bold antialiased">Create a Booking</h3>
                <div>
                    <label class="">Title:</label>
                    <input v-model="booking.title" type="text" class="border p-2 w-full"/>
                </div>

                <div>
                    <label class="block">Description:</label>
                    <textarea v-model="booking.description" class="border p-2 w-full"></textarea>
                </div>

                <div class="">
                    <div>
                        <label>Start Time:</label>
                        <input v-model="booking.start_time" type="datetime-local" class="border p-2"/>
                    </div>
                    <div class="mt-2">
                        <label>End Time:</label>
                        <input v-model="booking.end_time" type="datetime-local" class="border p-2"/>
                    </div>
                </div>

                <button type="submit" class="bg-gray-800 text-white px-4 py-2 rounded">Create</button>
            </form>

            <div v-if="message" class="mt-4 p-2 bg-green-200 text-green-800 rounded">
                {{ message }}
            </div>
        </div>
        </div>
    </div>
</template>


<script>
export default {
    data() {
        return {
            showModal: false,
            booking: {
                title: '',
                description: '',
                start_time: '',
                end_time: ''
            },
            message: ''
        }
    },
    methods: {
        async submitBooking() {
            try {
                const res = await fetch('/api/bookings', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify(this.booking)
                });
                const data = await res.json();
                this.message = 'Booking created successfully!';
                this.booking = { title: '', description: '', start_time: '', end_time: '' };
            } catch (err) {
                console.error(err);
                this.message = 'Error creating booking';
            }
        }
    }
}
</script>

<style scoped>
</style>
