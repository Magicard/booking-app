<template class="content-center" id="body">
    <div class="grid-3 content-center w-full">
        <div class="flex justify-between items-center py-10 px-10 bg-black text-white">
            <div class="text-4xl font-bold antialiased">Booking Page</div>
            <button @click="showModal = !showModal"  class="bg-white text-black text-2xl font-bold antialiased px-4 py-2 rounded hover:bg-gray-200">
                Create a Booking
            </button>
        </div>
        <div class="w-full border-b-5 border-gray-200 shadow"></div>
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-900 uppercase dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Booking title
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Description
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center">
                                <span>Start Time</span>
                                <a href="#" class="ml-1">
                                    <a href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                                    </svg></a>
                                </a>
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center">
                                <span>End Time</span>
                                <a href="#" class="ml-1">
                                    <a href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                                    </svg></a>
                                </a>
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center">
                                <span>Client</span>
                                <a href="#" class="ml-1">
                                    <a href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                                    </svg></a>
                                </a>
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center">
                                <span>User</span>
                                <a href="#" class="ml-1">
                                    <a href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                                    </svg></a>
                                </a>
                            </div>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-gray-200">
                        <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap">
                            First Booking
                        </th>
                        <td class="px-6 py-4">
                            Yabba
                        </td>
                        <td class="px-6 py-4">
                            Dabba
                        </td>
                        <td class="px-6 py-4">
                            Doo
                        </td>
                        <td class="px-6 py-4">
                            Bruce
                        </td>
                        <td class="px-6 py-4">
                            Wayne
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
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

                    <button type="submit" class="bg-black text-white px-4 py-2 rounded antialiased font-bold shadow hover:bg-gray-800">CREATE</button>
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
