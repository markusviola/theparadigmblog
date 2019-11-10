<template>
    <div>
        <div class="py-3" style="width: 100%; min-height: 80vh; background: #201e1f; color: #d4d3d3;">
            <div class="portfolio-direction font-weight-bold w-100">
                <div class="neutral-direction text-center mx-5" @click="goTo('projects')">
                    プロジェクト
                    <!-- Projects -->
                </div>
                <div class="neutral-direction text-center mx-5">
                    コンタクト
                    <!-- Contact -->
                </div>
            </div>
            <div class="portolio-title-wrapper container d-flex align-items-center" style="min-height: 80vh;">
                <div class="portolio-title-container">
                    <div class="portfolio-title">
                        <span class="alt-neutral">&lt;</span>
                        <span>
                            <!-- Hi, -->
                            こんにちは、
                            <!-- it's Markus. -->
                            マルクスです
                        </span>
                        <span class="alt-neutral">/&gt;</span>
                    </div>
                    <div class="mb-3" style="color: #abaaaa;">web • mobile • systems</div>
                    <div class="porfolio-description text-justify" style="color: #abaaaa;">
                        <div>
                            <!-- aside from my high versatility when it comes to development, may it be web, mobile or systems applications, my interest also inclines
                            to machine learning &amp; automations, cloud computing &amp; decentralized programming. -->
                            ウェブ、モバイル、システム開発に関する高い汎用性以外に、機械学習と自動化、クラウドコンピューティングとブロックチェーンにも強い関心を持っています
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>
        <div class="container mt-5 mb-5 pt-4">
            <h3 id="projects" class="text-center text-secondary font-weight-bold pt-3">
                プロジェクト
                <!-- Projects -->
            </h3>
            <hr class=" mb-5">
            <h4 class="portolio-sub-headers mb-4 alt-neutral font-weight-bold">&lt;
                自由時間開発
                <!-- Personal  -->
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
                            定義
                            <!-- Definition -->
                        </span>
                        <hr class="mt-0">
                        <div class="text-justify pr-3 mb-3">
                            <!-- An article writing web application that allows users to post and manage articles. The system also supports
                            profile customization and chatting, to establish an SNS-like environment. -->
                            ユーザーが記事を投稿と管理ができるように記事書き込みウェブアプリ。このシステムで、SNSのような環境を確立するために、チャットとプロファイルのカスタマイズもサポートされています。
                        </div>
                        <div class="mb-3">
                            <a class="alt-neutral" href="https://github.com/markusviola/theparadigmblog"><i class="fab fa-github fa-lg mr-2"></i>
                                Git
                                <span>
                                    レポ
                                    <!-- Repository -->
                                </span>
                            </a>
                        </div>
                        <span class="font-weight-bold">
                            使用技術
                            <!-- Technologies -->
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
                            定義
                            <!-- Definition -->
                        </span>
                        <hr class="mt-0">
                        <div class="text-justify pr-3 mb-3">
                            <!-- A space reservation system that allows the in-charge to manage client requests more efficently through forms &amp; chat.
                            The system also supports payment history statistics to monitor your profit. -->
                            予約管理者がフォームとチャットを通じてクライエントの予約要求をより効率的に管理できるスペース予約管理システム。また、ビジネスの利益を監視する支払記録もサポートします。
                        </div>
                        <div class="mb-3">
                            <a class="alt-neutral" href="https://github.com/markusviola/space-control"><i class="fab fa-github fa-lg mr-2"></i>
                                Git
                                <span>
                                    レポ
                                    <!-- Repository -->
                                </span>
                            </a>
                        </div>
                        <span class="font-weight-bold">
                            使用技術
                            <!-- Technologies -->
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
                企業開発経歴
                <!-- Work  -->
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
                            定義
                            <!-- Definition -->
                        </span>
                        <hr class="mt-0">
                        <div class="text-justify pr-3 mb-3">
                            日本に拠点を置く国際企業向けのeラーニングプラットフォーム。従業員がオンライン授業を通じて日本語を学び、認定された日本教師から学生の学習曲線を監視できるようにします。
                            <!-- An e-Learning platform for Japan-based international companies, enabling employees
                            to learn japanese through online activity sessions &amp; learing curve monitoring from certified japanese teachers. -->
                        </div>
                        <div class="mb-3">
                            <span class="text-muted"><i class="fab fa-github fa-lg mr-2"></i>

                                Git
                                <span>
                                    プライベートリポ
                                    <!-- Repository - Private -->
                                </span>
                            </span>
                        </div>
                        <span class="font-weight-bold">
                            使用技術・バックエンド開発者
                            <!-- Technologies • Backend Role -->
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
                            定義
                            <!-- Definition -->
                        </span>
                        <hr class="mt-0">
                        <div class="text-justify pr-3 mb-3">
                            ブロックチェーン技術愛好家向けのイーサリアムフレームワークベースのチュートリアルプラットフォーム。実際のブロックチェーンアプリを通じて分散開発をマスターするための足掛かりを提供します。
                            <!-- An Ethereum framework-based tutorial market platform for blockchain technology enthusiasts providing
                            stepping stones in mastering decentralized development through actual blockchain apps. -->
                        </div>
                        <div class="mb-3">
                            <span class="text-muted"><i class="fab fa-github fa-lg mr-2"></i>
                                Git
                                <span>
                                    プライベートリポ
                                    <!-- Repository - Private -->
                                </span>
                            </span>
                        </div>
                        <span class="font-weight-bold">
                            <!-- Technologies • Full Stack Role -->
                            使用技術・フルスタック開発者
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
                            定義
                            <!-- Definition -->
                        </span>
                        <hr class="mt-0">
                        <div class="text-justify pr-3 mb-3">
                            患者をリモートで効率的に調整および監視できる移行期ケアモバイルアプリケーション。このシステムは、ターミナルケアを必要としている患者ケア管理を提供しています。
                            <!-- A transitional care mobile application that lets you coordinate and monitor terminal patients
                            remotely and efficiently. -->
                        </div>
                        <div class="mb-3">
                            <span class="text-muted"><i class="fas fa-code-branch fa-lg mr-2"></i>
                                SVN
                                <span>
                                    プライベートリポ
                                    <!-- Repository -->
                                </span>
                            </span>
                        </div>
                        <span class="font-weight-bold">
                            使用技術・モバイルとバックエンド開発者
                            <!-- Technologies • Mobile &amp; Backend Role -->
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
