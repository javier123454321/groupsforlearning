@include('partials.head')
<nav>
    <div class="flex items-center justify-end w-screen h-20 px-4 duration-300 bg-purple-300 md:px-24"
            x-data="{showbg: false}"
            x-init="window.addEventListener('scroll', (e) => { showbg = window.scrollY > 630 } )"
            x-bind:class="{'bg-purple-300 bg-opacity-75 shadow-sm duration-300 fixed z-20 top-0': showbg, '-mb-20': !showbg}"
            x-on:shownav="showbg = true">
        <a href="/login" class="px-4 py-2 text-white bg-purple-700 rounded">Sign Up</a>
    </div>
</nav>
    <section>
        <div class="flex flex-wrap justify-around px-4 py-32 shadow-md md:p-24 min-h-80 bg-gradient-to-br from-blue-100 to-purple-300" x-data="formData()" @select.window="form.course = $event.detail; $refs.commitment.focus()">
            <div class="flex flex-col items-center justify-center max-w-lg text-center">
                <h1 class="mb-4 text-4xl font-black">You don't need a $10,000 bootcamp to learn to code.</h1>
                <p>Bootcamps can be useful, but if you want to learn anything, all the resources that you need are out there <strong>FOR FREE.</strong></p>
                <p>If you need the accountability, sign up and we can help!</p>
            </div>
            <div  x-show.transition="!submitted"  class="flex flex-col lg:w-1/3" >
                <form x-on:submit.prevent="submit()" class="flex flex-col text-left">
                    <label class="p-4 text-center text-red-900 bg-red-300 rounded-lg" x-show.transition="error" x-cloak>
                        There was an error, please try again or email me at <a class="underline" href="mailto:javier@groupsforlearning.com"> javier@groupsforlearning.com</a> to sign you up
                        <br> You can also join our discord server here <a class="w-8" href="https://discord.gg/GBG9f6gTq3"> <img src="/assets/discord.png" alt="join discord" srcset=""> </a>
                    </label>
                    <label class="p-4 text-center text-red-900 bg-red-300 rounded-lg" x-show.transition="invalid" x-cloak>
                       Please fill out all fields
                    </label>
                    <label for="course-select" class="mt-4">
                        Choose one of these amazing resources <br>
                    </label>
                    <select name="course" id="course-select" class="px-2 py-2 mt-4 bg-white border w-60" :class="{'border-red-600 border-4' : (invalid && form.course == 'none')}" x-model="form.course">
                        <option disabled selected value='none'>Select a Resource</option>
                        <option value="odin">The Odin Project</option>
                        <option value="codecamp">Free Code Camp</option>
                    </select>
                    <label for="commitment-select">
                        <br>Select how long you can commit to studying per week <br>
                    </label>
                    <select name="commitment" id="commitment-select" class="px-2 py-2 my-4 bg-white border w-60" :class="{'border-red-600 border-4' : (invalid && form.commitment == 'none')}" x-model="form.commitment" x-ref="commitment">
                        <option disabled selected value="none">Select a Time Commitment</option>
                        <option value="2hrs">1 - 2 hour per week</option>
                        <option value="5hrs">2 - 4 hours per week</option>
                        <option value="7hrs">1 hour per day</option>
                        <option value="14hrs">2+ hours a day (serious commitments only please)</option>
                    </select>
                    <label for="users-name">Your Name</label>
                    <input type="text" name="user_name" class="px-4 py-2 mb-4 bg-white border" id="users-name" :class="{'border-red-600 border-4' : (invalid && form.name == '')}" x-model="form.name">
                    <label for="users-name">Your Email</label>
                    <input type="email" name="user_email" class="px-4 py-2 mb-4 bg-white border" id="users-email" :class="{'border-red-600 border-4' : (invalid && form.email == '')}" x-model="form.email">
                    <div class="flex items-center mb-4 cursor-pointer" @click="form.newsletter = !form.newsletter">
                        <div class="w-6 h-6 mr-3 text-white bg-white rounded" :class="{'bg-blue-500': form.newsletter}" >
                            <svg x-show.transition="form.newsletter" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                              </svg>
                        </div>
                        <p class="pointer-events-none">Sign me up to get updates and tips for learning</p>
                    </div>
                    <input type="submit" value="Submit" class="px-4 py-2"></input>
                </form>

            </div>
                <div x-show.transition="submitted" x-cloak class="w-full my-12 text-center">
                    <div class="w-full p-10 mx-auto bg-gray-100 rounded shadow-lg md:w-3/4 lg:w-1/3">
                        <h2 class="text-lg font-black">Submitted. <br>We will contact you soon</h2>
                        <br>
                        Join our Discord!
                        <a class="flex justify-center" href="https://discord.gg/GBG9f6gTq3">
                            <img src="/assets/discord.png" alt="join discord" srcset="" class="w-12 hover:shadow-sm">
                        </a>
                    </div>
                </div>
        </div>
    </section>
    <section class="px-12 bg-indigo-50" id="learn-to-code-resources">
        <div class="px-4 py-12 md:p-24 md:py-32">
            <h2 class="text-2xl font-black">
                Learning to code is difficult. Finding the resources isn't.
            </h2>
            <p>These are the best places to go from beginner to employable developer</p>
        </div>
        <div class="flex flex-wrap w-full pb-20 justify-evenly" x-data>

            <div class="flex flex-col items-center w-2/3 my-6 text-center md:mt-0 md:w-1/5">
                <img class="h-32 max-w-48" src="assets/odinProject.png" alt="The Odin Project">
                <div class="max-w-xs">
                    <a href="https://www.theodinproject.com/paths">
                        <h4 class="mt-8 underline">The Odin Project</h4>
                    </a>
                    <p><strong>Prerequisites: </strong>None, learn the basics here</p>
                    <button @click="$dispatch('select', 'odin')" class="px-4 py-2 text-white bg-indigo-700 rounded">Join Cohort</button>
                </div>

            </div>

            <div class="flex flex-col items-center w-2/3 my-6 text-center md:mt-0 md:w-1/5">
                <img class="h-32 max-w-48" src="assets/fcc.png" alt="Free Code Camp">
                <div class="max-w-80">
                    <a href="https://www.freecodecamp.org/">
                        <h4 class="mt-8 underline">Free Code Camp</h4>
                    </a>
                    <p><strong>Prerequisites: </strong>None, learn the basics here</p>
                    <button @click="$dispatch('select', 'codecamp')" class="px-4 py-2 text-white bg-indigo-700 rounded">Join Cohort</button>
                </div>

            </div>
        </div>
        <div class="py-12 md:px-52">
            <h2 class="text-2xl font-black text-center">
                Neither of these is better than the other. Choose one and do it.
            </h2>
        </div>
    </section>
    <section id="what-we-offer">
        <div class="py-32 bg-gradient-to-br from-blue-100 to-purple-300 ">
            <h2 class="p-12 text-3xl font-black md:px-32">Find people to do the courses with.</h2>
        <div class="flex p-12 md:px-32">
            <div class="z-10 w-2/3 md:w-1/2">
                <h2 class="text-2xl font-black">Step 1. <br>Commit to learn </h2>
                <p>Scheduling a commitment ahead of time is the best way to ensure you will complete the work</p>
                <p>We recommend scheduling at least 3 hours per week for learning a new skill.</p>
            </div>
            <div class="z-0 hidden md:block md:w-1/2 md:transform md:translate-y-1/3 lg:transform-none lg:-mx-24 lg:-mb-24">
                <svg id="arrow_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 550.42 350.8" class="text-purple-300 stroke-current">
                    <g>
                        <path  stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="4"  stroke-dasharray="12.09 12.09" class="cls-1" d="M0,115.54c1.56-1.21,3.14-2.43,4.76-3.65" transform="translate(1.23 -1.84)"/>
                        <path  stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="4"  stroke-dasharray="12.09 12.09" class="cls-2" d="M14.56,104.81C96.68,47.56,245.24-6.29,301,60c79.33,94.31-21,220-152,151C93.82,181.94,63.91-17.77,340.79,5.76,428,13.17,635.25,147.94,401.5,327.91" transform="translate(1.23 -1.84)"/>
                        <path  stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="4"  stroke-dasharray="12.09 12.09" class="cls-1" d="M396.69,331.57c-1.58,1.2-3.18,2.39-4.81,3.59" transform="translate(1.23 -1.84)"/>
                        <path  stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="4"  d="M402.33,303.41a2,2,0,0,1,1.16,2.58l-10.9,28.59,30.52-2.21a2,2,0,0,1,.29,4l-33.65,2.44a2,2,0,0,1-2-2.71l12-31.53a2,2,0,0,1,2.58-1.15Z" transform="translate(1.23 -1.84)"/>
                    </g>
                </svg>
            </div>
        </div>
        <div class="flex justify-end px-12 md:px-32">
            <div class="-mb-32 -mr-32 md:w-2/3 xl:w-1/2">
                <svg class="text-purple-300 stroke-current" id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 336.97">
                    <path  stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="4" stroke-dasharray="12.09 12.09"  d="M437.73,149.8c-66-24-176,62-217,73s-249,20.58-215-99c48-169,325.4-153.73,257-6C245,156.08,154.16,205.93,152.72,291" transform="translate(1.23 -1.84)"/>
                    <path  stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="M133.88,263.44a2,2,0,0,1,2.76.65l16.15,26,16.72-25.63a2,2,0,1,1,3.35,2.19l-18.43,28.26a2,2,0,0,1-3.38,0L133.24,266.2a1.92,1.92,0,0,1-.3-1.08A2,2,0,0,1,133.88,263.44Z" transform="translate(1.23 -1.84)"/>
                </svg>
            </div>
            <div class="w-4/5 text-right md:w-1/2">
                <h2 class="text-2xl font-black">Step 2. <br>Sign up to a cohort for learning in a group</h2>
                <p>Universities are not for everyone. That doesn't mean that you have to miss out on learning with a group that is encouraging each other.</p>
            </div>
        </div>
        <div class="p-12 md:px-32">
            <div class="md:w-1/2">
                <h2 class="text-2xl font-black">Step 3.<br> Do the work and share </h2>
                <p>Giving feedback and teaching concepts allows you to be better at any skill, share what you have done, learn to improve it, and help others along the way.</p>
            </div>
        </div>
        <div class="flex justify-center align-center" x-data>
            <a class="px-4 py-2 mt-12 text-white bg-indigo-600 rounded cursor-pointer" @click="window.scroll(0,0)">Sign up to a cohort</a>
        </div>
        </div>
    </section>
    <section id="why" class="-mt-12 transform skew-y-3">
        <div class="py-32 bg-indigo-100">
            <div class="p-12 transform -skew-y-3 md:px-32">
                <h2 class="text-3xl font-black text-center">Q: Don't these courses already have a way to talk to others?</h2>
                <h3 class="mt-8 text-2xl font-black text-gray-800">A: Yes, they do, we recommend you also join them. All we are doing is grouping people that have the same time commitment and goals with each other</h3>

                <h2 class="mt-24 text-3xl font-black text-center">Q: Who is this for?</h2>
                <h3 class="mt-8 text-2xl font-black text-gray-800">A: Anyone that wants to learn how to code, or is thinking of joining a bootcamp because they need accountability.</h3>

                <h2 class="mt-24 text-3xl font-black text-center">Q: Why?</h2>
                <h3 class="mt-8 text-2xl font-black text-gray-800">A: My friend came to me the other day asking about recommendation for a bootcamp. I showed him these resources, he said that he wanted the accountability. <br> This is accountability without spending 10k.</h3>
            </div>
            <a class="flex flex-col items-center justify-center" href="https://discord.gg/GBG9f6gTq3">
                Join our Discord!
                <img src="/assets/discord.png" alt="join discord" srcset="" class="w-12">
            </a>
        </div>
    </section>
<script>
    function formData(){
        return {
            form: {
                course: "none",
                commitment: "none",
                name: "",
                email: "",
                newsletter: true
            },
            submitted: false,
            error: false,
            invalid: false,
            submit(){
                this.error = false;
                if(!this.isValidated()){ return };
                var data = new FormData();
                const {course, email, name, commitment, newsletter} = this.form;
                data.append("course", course);
                data.append("name", name);
                data.append("email", email);
                data.append("commitment", commitment);
                data.append("newsletter", newsletter);
                const url = `https://formspree.io/f/mgepdekv`
                fetch(url, {
                    method: 'POST',
                    redirect: 'follow',
                    headers: {'Accept': 'application/json'},
                    body: data,
                })
                .then(res => {
                    console.log(res);
                    if(res.ok){
                        this.submitted = true
                    }else{
                        this.error = true;
                    }
                    return res.json()
                })
            },
            isValidated(){
                const {course, email, name, commitment, newsletter} = this.form;
                if(course == 'none' || email == '' || name == '' || commitment == 'none'){
                    this.invalid = true;
                    return false
                }
                this.invalid = false
                return true
            }
        }
    }
</script>
</html>
