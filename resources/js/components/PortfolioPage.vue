<template>
    <div>
        <div class="py-3" style="width: 100%; min-height: 80vh; background: #201e1f; color: #d4d3d3;">
            <div class="portfolio-direction font-weight-bold w-100">
                <div class="neutral-direction text-center mx-5" @click="goTo('projects')">
                    Projects
                </div>
                <div class="neutral-direction text-center mx-5">
                    Contact
                </div>
            </div>
            <div class="portolio-title-wrapper container d-flex align-items-center" style="min-height: 80vh;">
                <div class="portolio-title-container">
                    <div class="portfolio-title">
                        <span class="alt-neutral">&lt;</span>
                        <span>Hi,</span>
                        <span>it's Markus.</span>
                        <span class="alt-neutral">/&gt;</span>
                    </div>
                    <div class="mb-3" style="color: #abaaaa;">web • mobile • systems</div>
                    <div class="porfolio-description text-justify" style="color: #abaaaa;">
                        <div>
                            aside from his high interest in both automation &amp; machine learning, he is also inclined in learning new technologies which made him pursue decentralized development.
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>
        <div class="container mt-5 mb-5 pt-4">
            <h3 id="projects" class="text-center text-secondary font-weight-bold pt-3">Projects</h3>
            <hr class=" mb-5">
            <h4 class="portolio-sub-headers mb-4 alt-neutral font-weight-bold">&lt; Personal &gt;</h4>
            <div class="row mb-5">
                <div
                    @click="redirectTo('http://markusviola.me')"
                    class="title-first col-md-5 neutral-button rev-neutral shadow h-100 d-flex justify-content-center align-items-center">
                    <div class="text-light text-left">
                        <h2>
                            The Paradigm Articles
                        </h2>
                        <div class="text-right">linking creative minds.</div>
                    </div>
                </div>
                <div
                    class="def-second col-md-7 shadow h-100 bg-light border text-secondary">
                    <div class="py-3">
                        <span class="font-weight-bold">Definition</span>
                        <hr class="mt-0">
                        <div class="text-justify pr-3 mb-3">
                            An article writing web application that allows users to post and manage articles. The system also supports
                            profile customization and chatting, to establish an SNS-like environment.
                        </div>
                        <div class="mb-3">
                            <a class="alt-neutral" href="https://github.com/markusviola/theparadigmblog"><i class="fab fa-github fa-lg mr-2"></i>Git Repository</a>
                        </div>
                        <span class="font-weight-bold">Technologies</span>
                        <hr class="mt-0">
                        <div class="text-justify font-weight-bold pl-5 pr-3">
                            <div class="row">
                                <div class="col-auto">PHP</div>
                                <div class="col-auto">Vue.js</div>
                                <div class="col-auto">Laravel</div>
                                <div class="col-auto">Echo</div>
                                <div class="col-auto">Pusher</div>
                                <div class="col-auto">MySQL</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-5">
                <div
                    class="def-first col-md-7 shadow h-100 bg-light border text-secondary">
                    <div class="py-3">
                        <span class="font-weight-bold">Definition</span>
                        <hr class="mt-0">
                        <div class="text-justify pr-3 mb-3">
                            A space reservation system that allows the in-charge to manage client requests more efficently through forms &amp; chat.
                            The system also supports payment history statistics to monitor your profit.
                        </div>
                        <div class="mb-3">
                            <a class="alt-neutral" href="https://github.com/markusviola/space-control"><i class="fab fa-github fa-lg mr-2"></i>Git Repository</a>
                        </div>
                        <span class="font-weight-bold">Technologies</span>
                        <hr class="mt-0">
                        <div class="text-justify font-weight-bold px-3">
                            <div class="row">
                                <div class="col-auto">PHP</div>
                                <div class="col-auto">Vue.js</div>
                                <div class="col-auto">Laravel</div>
                                <div class="col-auto">Echo</div>
                                <div class="col-auto">AWS EC2 • RDS</div>
                                <div class="col-auto">MySQL</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    @click="redirectTo('http://ec2-13-59-118-140.us-east-2.compute.amazonaws.com')"
                    class="title-second col-md-5 neutral-button rev-neutral shadow h-100 d-flex justify-content-center align-items-center">
                    <div class="text-light text-left">
                        <h2>
                            Space Control
                        </h2>
                        <div class="text-right">monetize your spaces efficiently.</div>
                    </div>
                </div>
            </div>
            <h4 class="portolio-sub-headers mb-4 alt-neutral font-weight-bold">&lt; Work &gt;</h4>
            <div class="row mb-5">
                <div
                    class="title-first col-md-5 rev-neutral shadow h-100 d-flex justify-content-center align-items-center">
                    <div class="text-light text-left">
                        <h2>
                            Babel
                        </h2>
                        <div class="text-right">Undo the language barrier.</div>
                    </div>
                </div>
                <div
                    class="def-second col-md-7 shadow h-100 bg-light border text-secondary">
                    <div class="py-3">
                        <span class="font-weight-bold">Definition</span>
                        <hr class="mt-0">
                        <div class="text-justify pr-3 mb-3">
                            An e-Learning platform for Japan-based international companies, enabling employees
                            to learn japanese through online activity sessions &amp; learing curve monitoring from certified japanese teachers.
                        </div>
                        <div class="mb-3">
                            <span class="text-muted"><i class="fab fa-github fa-lg mr-2"></i>Git Repository - Private</span>
                        </div>
                        <span class="font-weight-bold">Technologies • Backend Role</span>
                        <hr class="mt-0">
                        <div class="text-justify font-weight-bold px-3">
                            <div class="row">
                                <div class="col-auto">Node.js</div>
                                <div class="col-auto">Express.js</div>
                                <div class="col-auto">AWS EC2 • S3 • RDS</div>
                                <div class="col-auto">MySQL</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-5">
                <div
                    class="def-first col-md-7 shadow h-100 bg-light border text-secondary">
                    <div class="py-3">
                        <span class="font-weight-bold">Definition</span>
                        <hr class="mt-0">
                        <div class="text-justify pr-3 mb-3">
                            An Ethereum framework-based tutorial market platform for blockchain technology enthusiasts providing
                            stepping stones in mastering decentralized development through actual blockchain apps.
                        </div>
                        <div class="mb-3">
                            <span class="text-muted"><i class="fab fa-github fa-lg mr-2"></i>Git Repository - Private</span>
                        </div>
                        <span class="font-weight-bold">Technologies • Full Stack Role</span>
                        <hr class="mt-0">
                        <div class="text-justify font-weight-bold pl-5 pr-3">
                            <div class="row">
                                <div class="col-auto">Solidity</div>
                                <div class="col-auto">Ethereum</div>
                                <div class="col-auto">IPFS</div>
                                <div class="col-auto">Vue.js</div>
                                <div class="col-auto">Vuex</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    @click="redirectTo('https://www.openberry.ac/')"
                    class="title-second col-md-5 neutral-button rev-neutral shadow h-100 d-flex justify-content-center align-items-center">
                    <div class="text-light text-left">
                        <h2>
                            OpenBerry
                        </h2>
                        <div class="text-right">learn decentralized development.</div>
                    </div>
                </div>
            </div>
            <div class="row mb-5">
                <div
                    @click="redirectTo('https://play.google.com/store/apps/details?id=centric.noteefied.com.centric&hl=en_US')"
                    class="title-first col-md-5 neutral-button rev-neutral shadow h-100 d-flex justify-content-center align-items-center">
                    <div class="text-light text-left">
                        <h2>
                            Centric Solution
                        </h2>
                        <div class="text-right">a service assuring second chances.</div>
                    </div>
                </div>
                <div
                    class="def-second col-md-7 shadow h-100 bg-light border text-secondary">
                    <div class="py-3">
                        <span class="font-weight-bold">Definition</span>
                        <hr class="mt-0">
                        <div class="text-justify pr-3 mb-3">
                            A transitional care mobile application that lets you coordinate and monitor terminal patients
                            remotely and efficiently.
                        </div>
                        <div class="mb-3">
                            <span class="text-muted"><i class="fas fa-code-branch fa-lg mr-2"></i>SVN Repository</span>
                        </div>
                        <span class="font-weight-bold">Technologies • Mobile &amp; Backend Role</span>
                        <hr class="mt-0">
                        <div class="text-justify font-weight-bold px-3">
                            <div class="row">
                                <div class="col-auto">Kotlin</div>
                                <div class="col-auto">C#</div>
                                <div class="col-auto">ASP.NET Core</div>
                                <div class="col-auto">AWS S3</div>
                                <div class="col-auto">MS SQL Server</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <hr>
        <div class="px-4 d-flex justify-content-center align-items-center" style="width: 100%; height: 4vh; background: #201e1f; color: #d4d3d3;">
            <div>&copy; 2019 Markus Viola • <span class="font-italic">keep grinding, keep learning.</span></div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {

        }
    },
    mounted() {

    },
    methods: {
        redirectTo(link) {
            location.href = link;
        },
        goTo(element) {
            doScrolling(`#${element}`, 1300);
        }
    }
}
</script>
