<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate Attendance Report</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
</head>
<body class="bg-green-200 font-sans">

    <!-- Header -->
    <header class="bg-green-700 py-4">
        <div class="container mx-auto text-center">
            <h1 class="text-4xl font-semibold text-white">Generate Attendance Report</h1>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto mt-8 p-4 bg-white rounded-lg shadow-lg">
        <h2 class="text-3xl font-semibold mb-4 text-gray-800">Report Criteria</h2>

        <!-- Date Picker -->
        <div class="mb-6">
            <label class="block text-gray-700 font-bold mb-2" for="datePicker">Select Date Range:</label>
            <input type="text" id="datePicker" class="w-full px-4 py-2 rounded-lg bg-gray-100 focus:outline-none focus:ring-2 focus:ring-green-500" placeholder="Select date range..." data-toggle="flatpickr">
        </div>

        <!-- Class Selection -->
        <div class="mb-6">
            <label class="block text-gray-700 font-bold mb-2" for="classSelect">Select Class:</label>
            <select id="classSelect" class="w-full px-4 py-2 rounded-lg bg-gray-100 focus:outline-none focus:ring-2 focus:ring-green-500">
                <option value="class1">Class 1</option>
                <option value="class2">Class 2</option>
                <!-- Add more options here -->
            </select>
        </div>

        <!-- Generate Button -->
        <button class="bg-green-700 hover:bg-green-800 text-white px-6 py-3 rounded-lg text-lg font-semibold transition-colors duration-300">Generate Report</button>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            flatpickr("#datePicker", {
                dateFormat: "Y-m-d",
                enableTime: false,
                minDate: ""
            });
        });
    </script>
</body>
</html>
