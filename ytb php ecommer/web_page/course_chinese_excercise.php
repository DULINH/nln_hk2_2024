<?php
  try {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "nln_hk2_2024";

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    foreach ($_GET as $key => $value) {
        $lastKey = substr($key, -1);
        $lasttwoKey = substr($key, -2);
    }

    if($lastKey <=9 && $lastKey != 0) {
        // Giới hạn số lượng câu hỏi được lấy từ cơ sở dữ liệu
        $stmtQues = $conn->prepare("SELECT eng_question, eng_answer1, eng_answer2, eng_answer3, eng_answer4, eng_correct_answer, eng_course_testID
            FROM eng_excercise
            WHERE eng_course_testID = :lastKey
            ORDER BY RAND()
            LIMIT 20"); 

        $stmtQues->bindParam(":lastKey", $lastKey, PDO::PARAM_INT);
        $stmtQues->execute();
        $questions = $stmtQues->fetchAll(PDO::FETCH_ASSOC);
    } else {
        // Giới hạn số lượng câu hỏi được lấy từ cơ sở dữ liệu
        $stmtQues = $conn->prepare("SELECT eng_question, eng_answer1, eng_answer2, eng_answer3, eng_answer4, eng_correct_answer, eng_course_testID
            FROM eng_excercise
            WHERE eng_course_testID = :lasttwoKey
            ORDER BY RAND()
            LIMIT 20"); 

        $stmtQues->bindParam(":lasttwoKey", $lasttwoKey, PDO::PARAM_INT);
        $stmtQues->execute();
        $questions = $stmtQues->fetchAll(PDO::FETCH_ASSOC);
    }

    } catch (PDOException $e) {
        echo "Kết nối không thành công: " . $e->getMessage();
    }

// Hàm trộn ngẫu nhiên các câu trả lời
function shuffleAnswers($question) {
    $answers = array($question['eng_answer1'], $question['eng_answer2'], $question['eng_answer3'], $question['eng_answer4']);
    shuffle($answers);
    return $answers;
}
?>
<main class="mt-2 container" id="index_home_page">
    <h2 class="mb-4">English Test 
        <?php 
            if($lastKey <=9 && $lastKey != 0) {
                echo "$lastKey";
            } else {
                echo "$lasttwoKey";
            }
        ?>
    </h2>

    <form id="quizForm">
        <?php foreach($questions as $index => $question): ?>
        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title">Câu
                    <?php echo $index + 1; ?>:
                    <?php echo $question['eng_question']; ?>
                </h5>
                <?php $shuffledAnswers = shuffleAnswers($question); ?>
                <?php foreach($shuffledAnswers as $answerIndex => $answer): ?>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="answers[<?php echo $index; ?>]"
                        value="<?php echo $answer; ?>"
                        data-correct-answer="<?php echo $question['eng_correct_answer']; ?>"
                        onchange="handleCheckboxChange(this)">
                    <label class="form-check-label">
                        <?php echo $answer; ?>
                    </label>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endforeach; ?>

        <button type="button" class="btn btn-primary" onclick="checkAnswers()">Submit</button>
    </form>

    <!-- Result Modal -->
    <div class="modal fade" id="resultModal" tabindex="-1" aria-labelledby="resultModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="resultModalLabel">Log In</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p id="resultText"></p>
                    <p id="wrongQuestions"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


</main>


<script>
    function handleCheckboxChange(checkbox) {
        // Uncheck other checkboxes in the same question group
        var checkboxes = document.getElementsByName(checkbox.name);
        checkboxes.forEach(function (cb) {
            if (cb !== checkbox) {
                cb.checked = false;
            }
        });
    }

    function checkAnswers() {
        var form = document.getElementById('quizForm');
        var selectedAnswers = [];
        var correctAnswers = 0;
        var wrongQuestions = [];

        for (var i = 0; i < form.elements.length; i++) {
            var element = form.elements[i];

            if (element.type === 'checkbox' && element.checked) {
                selectedAnswers.push(element.value);

                // Compare selected answer with correct answer
                if (element.value === element.dataset.correctAnswer) {
                    correctAnswers++;
                } else {
                    // Push the question index instead of the element name
                    wrongQuestions.push(parseInt(element.name.replace('answers[', '').replace(']', '')) + 1);
                }
            }
        }

        var resultText, wrongQuestionsText;

        if (wrongQuestions.length === 0) {
            resultText = 'Good! Số câu đúng: ' + correctAnswers + ' / <?php echo count($questions); ?>';
            wrongQuestionsText = 'Không có câu trả lời sai';
        } else {
            resultText = 'Số câu đúng: ' + correctAnswers + ' / <?php echo count($questions); ?>';
            wrongQuestionsText = 'Các câu trả lời sai: ' + wrongQuestions.join(', ');
        }

        document.getElementById('resultText').innerText = resultText;
        document.getElementById('wrongQuestions').innerText = wrongQuestionsText;

        $('#resultModal').modal('show');
    }
</script>