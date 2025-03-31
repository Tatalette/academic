package view;

import controller.Controller;

import javax.swing.*;
import java.awt.*;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.awt.event.FocusAdapter;
import java.awt.event.FocusEvent;

public class SwingIHM extends JFrame implements IHM {
    private JTextField SearchField;
    private JButton SearchButton;
    private JPanel ResultPanel;
    private JPanel mainPanel;

    public SwingIHM() {
        Controller ctrl = new  Controller(this);
        setContentPane(mainPanel);
        setDefaultCloseOperation(EXIT_ON_CLOSE);
        setSize(300, 500);
        setLocationRelativeTo(null);
        setVisible(true);
        this.ResultPanel.setBackground(Color.CYAN);

        SearchButton.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                String search = SearchField.getText();
                ResultPanel.removeAll();

                System.out.println("search: |" + search + "|");

                JLabel ResultLabel = new JLabel("Test");
                if (search.isEmpty()) {
                    ResultLabel.setText("No Recipe Found");
                } else {
                    ResultLabel.setText(search);
                }
                ResultPanel.add(ResultLabel);
                ResultPanel.validate();
                ResultPanel.repaint();

            }
        });
    }


}
