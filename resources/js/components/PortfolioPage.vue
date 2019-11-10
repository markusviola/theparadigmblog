<template>
    <div>
        <div class="py-3" style="width: 100%; min-height: 80vh; background: #201e1f; color: #d4d3d3;">
            <div class="portfolio-direction font-weight-bold w-100">
                <div class="neutral-direction text-center mx-5" @click="goTo('projects')">
                    {{ this.portfolio.projects }}
                </div>
                <div class="neutral-direction text-center mx-5">
                    {{ this.portfolio.contact }}
                </div>
            </div>
            <div class="portolio-title-wrapper container d-flex align-items-center" style="min-height: 80vh;">
                <div class="portolio-title-container">
                    <div class="neutral-direction mb-3 d-inline font-weight-bold w-100" @click="toggleLanguage">
                        {{ this.is_en ? '&lt; 日本語 &gt;' : '&lt; English &gt;' }}
                    </div>
                    <div class="portfolio-title">
                        <span class="alt-neutral">&lt;</span>
                        <span>
                            {{ this.portfolio.intro }}
                        </span>
                        <span class="alt-neutral">/&gt;</span>
                    </div>
                    <div class="mb-3" style="color: #abaaaa;">web • mobile • systems</div>
                    <div class="porfolio-description text-justify" style="color: #abaaaa;">
                        <div>
                            {{ this.portfolio.desc }}
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <br>
        <br>
        <div class="container mt-5 mb-5 pt-4">
            <h3 id="projects" class="text-center text-secondary font-weight-bold pt-3">
                {{ this.portfolio.projects }}
            </h3>
            <hr class=" mb-5">
            <h4 class="portolio-sub-headers mb-4 alt-neutral font-weight-bold">&lt;
                {{ this.portfolio.personal }}
            &gt;</h4>
            <div class="row mb-5">
                <div
                    @click="redirectTo('http://markusviola.me')"
                    class="title-first col-md-5 neutral-button rev-neutral shadow h-100 d-flex justify-content-center align-items-center">
                    <div class="text-light text-left">
                        <h2>
                            The Paradigm Articles
                        </h2>
                        <div class="text-right">
                            linking creative minds.
                        </div>
                    </div>
                </div>
                <div
                    class="def-second col-md-7 shadow h-100 bg-light border text-secondary">
                    <div class="py-3">
                        <span class="font-weight-bold">
                            {{ this.portfolio.definition }}
                        </span>
                        <hr class="mt-0">
                        <div class="text-justify pr-3 mb-3">
                            {{ this.portfolio.paradigm_articles }}
                        </div>
                        <div class="mb-3">
                            <a class="alt-neutral" href="https://github.com/markusviola/theparadigmblog"><i class="fab fa-github fa-lg mr-2"></i>
                                Git
                                <span>
                                    {{ this.portfolio.repo }}
                                </span>
                            </a>
                        </div>
                        <span class="font-weight-bold">
                            {{ this.portfolio.technologies }}
                        </span>
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
                        <span class="font-weight-bold">
                            {{ this.portfolio.definition }}
                        </span>
                        <hr class="mt-0">
                        <div class="text-justify pr-3 mb-3">
                            {{ this.portfolio.space_control }}
                        </div>
                        <div class="mb-3">
                            <a class="alt-neutral" href="https://github.com/markusviola/space-control"><i class="fab fa-github fa-lg mr-2"></i>
                                Git
                                <span>
                                    {{ this.portfolio.repo }}
                                </span>
                            </a>
                        </div>
                        <span class="font-weight-bold">
                            {{ this.portfolio.technologies }}
                        </span>
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
            <h4 class="portolio-sub-headers mb-4 alt-neutral font-weight-bold">&lt;
                {{ this.portfolio.work }}
            &gt;</h4>
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
                        <span class="font-weight-bold">
                            {{ this.portfolio.definition }}
                        </span>
                        <hr class="mt-0">
                        <div class="text-justify pr-3 mb-3">
                            {{ this.portfolio.babel }}
                        </div>
                        <div class="mb-3">
                            <span class="text-muted"><i class="fab fa-github fa-lg mr-2"></i>

                                Git
                                <span>
                                    {{ this.portfolio.repo_private }}
                                </span>
                            </span>
                        </div>
                        <span class="font-weight-bold">
                            {{ this.portfolio.techonologies }}・{{ this.portfolio.backend }}
                        </span>
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
                        <span class="font-weight-bold">
                            {{ this.portfolio.definition }}
                        </span>
                        <hr class="mt-0">
                        <div class="text-justify pr-3 mb-3">
                            {{ this.portfolio.openberry }}
                        </div>
                        <div class="mb-3">
                            <span class="text-muted"><i class="fab fa-github fa-lg mr-2"></i>
                                Git
                                <span>
                                    {{ this.portfolio.repo_private }}
                                </span>
                            </span>
                        </div>
                        <span class="font-weight-bold">
                            {{ this.portfolio.techonologies }} • {{ this.portfolio.fullstack }}
                        </span>
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
                        <span class="font-weight-bold">
                           {{ this.portfolio.definition }}
                        </span>
                        <hr class="mt-0">
                        <div class="text-justify pr-3 mb-3">
                            {{ this.portfolio.centric }}
                        </div>
                        <div class="mb-3">
                            <span class="text-muted"><i class="fas fa-code-branch fa-lg mr-2"></i>
                                SVN
                                <span>
                                    {{ this.portfolio.repo_private }}
                                </span>
                            </span>
                        </div>
                        <span class="font-weight-bold">
                            {{ this.portfolio.techonologies }}・{{ this.portfolio.mobile_backend }}
                        </span>
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
    props: ['portfolio'],
    data() {
        return {
            is_en: true,
        }
    },
    mounted() {
        this.is_en = this.portfolio.lang == 'en';
    },
    methods: {
        redirectTo(link) {
            location.href = link;
        },
        goTo(element) {
            doScrolling(`#${element}`, 1300);
        },
        toggleLanguage() {
            location.href = `/portfolio/${this.is_en ? 'jp' : 'en'}`;
        }
    }
}
</script>
