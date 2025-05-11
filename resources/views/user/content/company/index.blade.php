<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keypoint Media & Entertainment Limited</title>

    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

</head>

<body class="bg-gray-900 text-gray-100">
    <!-- Navigation -->
    <nav class="bg-gray-800 shadow-lg fixed w-full z-50">
        <div class="container mx-auto px-6 py-4">
            <div class="flex items-center justify-between">
                <a href="{{ route('user.dashboard') }}">
                    <div class="text-2xl font-bold text-royalPurple">KME</div>
                </a>
                <div class="hidden md:flex space-x-8">
                    <a href="#intro" class="text-gray-300 hover:text-royalPurple">About</a>
                    <a href="#partners" class="text-gray-300 hover:text-royalPurple">Partners</a>
                    <a href="#impact" class="text-gray-300 hover:text-royalPurple">Impact</a>
                    <a href="#development" class="text-gray-300 hover:text-royalPurple">Development</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <header class="pt-24 pb-16 bg-gradient-to-br from-gray-900 via-deep-purple/20 to-gray-800">
        <div class="container mx-auto px-6">
            <div class="flex flex-col md:flex-row items-center justify-between">
                <div class="md:w-1/2 mb-8 md:mb-0">
                    <div
                        class="inline-block px-4 py-1 bg-royalPurple/20 rounded-full text-royalPurple font-semibold mb-6">
                        Keypoint Media & Entertainment
                    </div>
                    <h1 class="text-4xl md:text-6xl font-bold text-white mb-6 leading-tight">
                        The Global<br />
                        <span class="text-royalPurple">Awards 2024</span>
                    </h1>
                    <p class="text-xl text-gray-300 mb-8 leading-relaxed">
                        Celebrating excellence in media and entertainment worldwide. Join us in recognizing outstanding
                        achievements.
                    </p>
                </div>
                <div class="md:w-1/2 flex justify-center">
                    <div class="relative">
                        <div
                            class="absolute -inset-4 bg-gradient-to-r from-royalPurple to-deep-purple rounded-3xl opacity-30 blur-xl">
                        </div>
                        <div class="relative bg-gray-800 p-8 rounded-2xl shadow-xl border border-gray-700">
                            <div class="grid grid-cols-2 gap-4">
                                <div class="bg-royalPurple/10 p-4 rounded-xl">
                                    <div class="text-4xl font-bold text-royalPurple mb-1">24+</div>
                                    <div class="text-sm text-gray-300">Award Categories</div>
                                </div>
                                <div class="bg-royalPurple/10 p-4 rounded-xl">
                                    <div class="text-4xl font-bold text-royalPurple mb-1">150+</div>
                                    <div class="text-sm text-gray-300">Nominees</div>
                                </div>
                                <div class="bg-royalPurple/10 p-4 rounded-xl">
                                    <div class="text-4xl font-bold text-royalPurple mb-1">50+</div>
                                    <div class="text-sm text-gray-300">Countries</div>
                                </div>
                                <div class="bg-royalPurple/10 p-4 rounded-xl">
                                    <div class="text-4xl font-bold text-royalPurple mb-1">1M+</div>
                                    <div class="text-sm text-gray-300">Viewers</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto px-6 py-16">
        <!-- Introduction Section -->
        <section id="intro" class="mb-20">
            <div class="max-w-4xl mx-auto">
                <h2 class="text-3xl font-bold mb-8 text-white flex items-center">
                    <span class="w-12 h-1 bg-royalPurple mr-4"></span>
                    About KME
                </h2>
                <div class="bg-gray-800 shadow-lg rounded-2xl p-8 border border-gray-700">
                    <p class="text-lg text-gray-300 mb-6 leading-relaxed">
                        Keypoint Media & Entertainment Limited (KME) was founded by Ashley Tabor in 2007 and is
                        headquartered in London, UK. As one of the world's leading media and entertainment groups, KME
                        is committed to providing high-quality creative content and services to global audiences through
                        a wide range of media platforms and advertising resources.
                    </p>
                    <p class="text-lg text-gray-300 leading-relaxed">
                        Global is the largest radio and out-of-home company in the UK and Europe, owning some of the
                        UK's most popular radio stations including Heart, Capital, LBC, Classic FM, Smooth, Radio X and
                        Gold Radio.
                    </p>
                </div>
            </div>
        </section>

        <!-- Partners Section -->
        <section id="partners" class="mb-20">
            <div class="max-w-4xl mx-auto">
                <h2 class="text-3xl font-bold mb-8 text-white flex items-center">
                    <span class="w-12 h-1 bg-royalPurple mr-4"></span>
                    Our Partners
                </h2>
                <div class="bg-gray-800 shadow-lg rounded-2xl p-8 border border-gray-700">
                    <p class="text-lg text-gray-300 mb-8 leading-relaxed">
                        The government is committed to being a trustworthy global film and television promoter. Through
                        outstanding services and innovative solutions, we have established strategic partnerships with
                        leading industry players including Special Photography, Warner Broadcasting, 20th Global News,
                        "Popular TV", "Popular Film", and other major companies to enhance our presence and credibility
                        in the industry.
                    </p>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                        <div
                            class="aspect-square bg-gray-700 rounded-xl flex items-center justify-center p-6 hover:shadow-md transition-shadow">
                            <i class="fas fa-tv text-4xl text-royalPurple"></i>
                        </div>
                        <div
                            class="aspect-square bg-gray-700 rounded-xl flex items-center justify-center p-6 hover:shadow-md transition-shadow">
                            <i class="fas fa-film text-4xl text-royalPurple"></i>
                        </div>
                        <div
                            class="aspect-square bg-gray-700 rounded-xl flex items-center justify-center p-6 hover:shadow-md transition-shadow">
                            <i class="fas fa-camera text-4xl text-royalPurple"></i>
                        </div>
                        <div
                            class="aspect-square bg-gray-700 rounded-xl flex items-center justify-center p-6 hover:shadow-md transition-shadow">
                            <i class="fas fa-broadcast-tower text-4xl text-royalPurple"></i>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Impact Section -->
        <section id="impact" class="mb-20">
            <div class="max-w-4xl mx-auto">
                <h2 class="text-3xl font-bold mb-8 text-white flex items-center">
                    <span class="w-12 h-1 bg-royalPurple mr-4"></span>
                    Our Impact
                </h2>
                <div class="bg-gray-800 shadow-lg rounded-2xl p-8 border border-gray-700">
                    <div class="grid md:grid-cols-3 gap-8 mb-8">
                        <div class="text-center">
                            <div class="text-4xl font-bold text-royalPurple mb-2">1M+</div>
                            <div class="text-gray-300">People Employed</div>
                        </div>
                        <div class="text-center">
                            <div class="text-4xl font-bold text-royalPurple mb-2">50+</div>
                            <div class="text-gray-300">Countries</div>
                        </div>
                        <div class="text-center">
                            <div class="text-4xl font-bold text-royalPurple mb-2">15+</div>
                            <div class="text-gray-300">Years Experience</div>
                        </div>
                    </div>
                    <p class="text-lg text-gray-300 leading-relaxed">
                        We have successfully helped millions of people around the world gain employment and training in
                        the film and television industry. In recent years, the Nigerian government invited us - Global
                        Media and Regional Limited - to deepen cooperation, expand the government's influence in the
                        Nigerian market and create more jobs.
                    </p>
                </div>
            </div>
        </section>

        <!-- Development Section -->
        <section id="development" class="mb-20">
            <div class="max-w-4xl mx-auto">
                <h2 class="text-3xl font-bold mb-8 text-white flex items-center">
                    <span class="w-12 h-1 bg-royalPurple mr-4"></span>
                    Future Development
                </h2>
                <div class="bg-gray-800 shadow-lg rounded-2xl p-8 border border-gray-700">
                    <p class="text-lg text-gray-300 mb-8 leading-relaxed">
                        In Nigeria, we will invest more funds and budget to implement innovative recruitment and
                        management models. This will not only enable more talented individuals to join the industry but
                        create more career development opportunities. Every staff member will participate in recruitment
                        and training programs to contribute to the company's growth. The earlier you join, the greater
                        your chances of advancement. We offer competitive salaries and incentives to ensure that your
                        contributions are appropriately compensated.
                    </p>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 border-t border-gray-700 py-6">
        <div class="container mx-auto px-6">
            <div class="text-center text-gray-400">
                <p>&copy; 2025 Kepoint Media & Entertainment Limited. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>

</html>
