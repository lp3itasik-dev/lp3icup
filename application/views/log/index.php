<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <!-- Tambahkan link ke CDN Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            background-color: rgb(254 252 232);
        }
    </style>
</head>

<body class="flex items-center justify-center h-screen bg-cyan-200">
    <div class="bg-white p-8 rounded shadow-md w-96">
        <h1 class="text-2xl font-semibold mb-6">Login</h1>
        <form>
            <div class="mb-4">
                <label for="username" class="block text-sm font-medium text-gray-600">Username</label>
                <input type="text" id="username" name="username" class="mt-1 p-2 w-full border rounded-md">
            </div>
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-600">Password</label>
                <input type="password" id="password" name="password" class="mt-1 p-2 w-full border rounded-md">
            </div>
            Belum Punya Akun ? <a href="<?= base_url('regis') ?>">Register</a><br><br>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Login</button>
            <!-- <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Registrasi</button> -->
        </form>
    </div>
</body>

</html>